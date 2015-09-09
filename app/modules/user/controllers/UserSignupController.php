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
        if($model->validate($input_data)) {
            $model->email = $input_data['email_address'];
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
                    Session::flash('danger', 'Invalid Request. Please Try Again.');
                    return Redirect::back();
                }
            }
        }else {
            Session::flash('danger', 'Please Try Again.');
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

    public function Dashboard()
    {
        return View::make('user::signup.dashboard');
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

    //********************** Forgot password Start(R) *****************************

    public function forgot_password()
    {
        return View::make('user::forgot_password.email_form');
    }

    public function user_password_reminder_mail()
    {
        $rules = array(
            'email' => 'Required|email|exists:user',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');
            return Redirect::back();
        }else{
            $email = Input::get('email');
            $users = DB::table('user')->where('email', '=',$email)->first();
            $user_id = $users->id;
            $email_address = $users->email;

            //random number with 30 character
            $reset_password_token = str_random(30);

            //convert date format
//            date_default_timezone_set("Asia/Dacca");
            $date = date('Y-m-d h:i:s', time());
//            print_r($date);exit;
            $shortFormat = strtotime($date);
            $reset_password_expire = date("Y-m-d h:i:s", ($shortFormat+(60*30)));
//            print_r($reset_password_expire);exit;
            $reset_password_time = date('Y-m-d h:i:s', time());
            $data = new UserResetPassword();
            $data->user_id = $user_id;
            $data->reset_password_token = $reset_password_token;
            $data->reset_password_expire = $reset_password_expire;
            $data->reset_password_time = $reset_password_time;
            $data->status = '2'; // 2 == reset requested
            if($data->save())
            {
                Mail::send('user::forgot_password.email_notification', array('link' =>$reset_password_token),  function($message) use ($email_address)
                {
                    $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
                    $message->to($email_address);
                    $message->cc('tanintjt@gmail.com');
                    $message->subject('Notification');
                });
            }
            Session::flash('message', 'Please Check Your Email For Further Process.');
            return Redirect::back();
        }
    }
    //forgot password : confirm
    public function userPasswordResetConfirm($reset_password_token)
    {
        $userReset = UserResetPassword::where('reset_password_token', $reset_password_token)
            ->exists();
        if($userReset) {
            $user_reset_info = UserResetPassword::select('id','user_id', 'reset_password_expire', 'status','reset_password_time')
                ->where('reset_password_token', $reset_password_token)
                ->first();
            $reset_expire = $user_reset_info->reset_password_expire;
//            print_r($reset_expire);
            $reset_time = $user_reset_info->reset_password_time;
//            print_r($reset_time);
            $reset_status = $user_reset_info->status;
            // $now = date('Y-m-d h:i:s', time());
//print_r($reset_status);exit;
            if ($reset_expire > $reset_time && $reset_status == 2) {
                $model = UserResetPassword::find($user_reset_info->id);
                $model->status = 0;
                if($model->save()){
                    return View::make('user::signup.password_reset_form')
                        ->with('user_id', $user_reset_info->user_id );
                }else{
                    echo "Invalid!";
                }
            } else {
                echo "Session Expired!";
            }
        }else{
            Session::flash('danger', 'Incorrect URL.Please try again');
            return View::make('user::forgot_password.email_form');
        }
    }
    // forgot password: get new password action
    public function userPasswordUpdate()
    {
        $users = Input::get('id');
        if ($users) {

            $model = User::findOrFail($users);
            $model->password = Input::get('password');
            $model->save();
        }

        Session::flash('message','Your have got your password successfully. You may signin now.');
        return Redirect::route('user/login');

    }

//*********************Forgot UserName Start(R)***********************************

    public function usernameReset()
    {
        return View::make('user::signup.username_reset');
    }

    public  function usernameResetMail(){

        $rules = array(
            'email' => 'Required|email|exists:user',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');

            return Redirect::back();

        }else{
            $userData = User::where('email', Input::get('email'))->first();
            $username = $userData->username;
            $email_address = Input::get('email');
            Mail::send('user::signup.username_reset_mail', array('link' =>$username),  function($message) use ($email_address)
            {
                $message->from('edutechsolutionsbd.com', 'Mail Notification');
                $message->to($email_address);
                // $message->cc('tanintjt@gmail.com');
                $message->subject('Notification');

            });
        }
        Session::flash('message', 'We Have Send Your UserName to Your Email Address.Please Check Your Email.');
        return View::make('user::signup.username_reset');
    }

}