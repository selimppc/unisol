<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSignupController extends \BaseController {

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function Userindex()
    {
        $role_name = Role:: lists('code','id');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
        return View::make('user::signup.index',compact('department','countryList','role_name'));
    }

    public function Userstore()
    {
        $input_data = Input::all();
        //model
        $model = new User();

        if($model->validate($input_data))
        {
            $model->email = $input_data['email'];
            $model->username = $input_data['username'];
            $model->password = $input_data['password'];//dd($data->password);
            $model->csrf_token = $input_data['_token'];
            $model->department_id = $input_data['department_id'];
            $model->role_id = $input_data['role_id'];
            $model->verified_code = str_random(30);
            $model->ip_address = getHostByName(getHostName());
            $model->status = 1;
            if ($model->save()) {
                $model1 = new UserProfile();
                if($model1->validate($input_data)) {
                    $model1->user_id = $model->id;
                    $model1->first_name = Input::get('first_name');
                    $model1->middle_name = Input::get('middle_name');
                    $model1->last_name = Input::get('last_name');
                    $model1->date_of_birth = Input::get('date_of_birth');
                    $model1->gender = Input::get('gender');
                    $model1->city = Input::get('city');
                    $model1->state = Input::get('state');
                    $model1->country = Input::get('country');
                    $model1->zip_code = Input::get('zip_code');
                    $model1->save();
                    Session::flash('message', "Thanks for signing up! You can login now at <a href='user/login'><b>User Login</b></a>");
                    return Redirect::to('user-signup');
                }else{
                    $errors = $model->errors();
                    Session::flash('errors', $errors);
                    return Redirect::back();
                }
            }
        }else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function send_users_email()
    {
        $users = DB::table('user')->select('email')->get();
        $emailList = array();
        foreach($users as $user)
        {
            $emailList[]=$user->email;
        }
        $confirmation_code = str_random(30);
        $data = array
        (
            'message_var' => Input::get('message_details')
        );

        Mail::send('user::signup.verify', array('link' => $confirmation_code),  function($message) use ($emailList)
        {
            $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
            $message->to($emailList);
            $message->subject('Notification');
        });
    }

    // method for verification_code via user's email.....
    public function confirm($verified_code)
    {
        $user = User::where('verified_code','=',$verified_code);
        if($user->count())
        {
            $user = $user->first();
            $user->verified_code = '';
        }
        Session::flash('message','Your account activated successfully. You can signin now.');
        return Redirect::to('usersign/login');
    }

    public function Login()
    {
        return View::make('user::signup.login');
    }


    public function UserLogin()
    {
        $credentials = array(
            'username'=> Input::get('username'),
            'password'=>Input::get('password'),
        );

        if(Auth::check()){
            $user_id = Auth::user()->get()->username;
            $pageTitle = 'You are already logged in!';
            echo $pageTitle;
            //return View::make('usersign/dashboard', compact('user_id', 'pageTitle'));
        }else{
            if ( Auth::attempt($credentials) ) {
                return Redirect::to('usersign/dashboard')->with('message', 'Logged in!');
            } else {
                return Redirect::to('usersign/login') ->with('message', 'Your username/password combination was incorrect! Please try again....')
                    ->withInput();
            }
        }

    }

    public function usersLogout()
    {
        $model= User::find(Auth::user()->id);
        date_default_timezone_set("Asia/Dacca");
        $time=date('Y-m-d h:i:s', time());;
        $model->last_visit = $time;
        $model->save();
        Auth::logout();
        return Redirect::to('usersign/login')->with('message', 'Your are now logged out!');
    }
}