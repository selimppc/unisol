<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSignupController extends \BaseController {

	public function Userindex()
	{
        return View::make('admission::signup.index');
	}

    public function create()
	{

	}

    public function Userstore()
    {

        $token = csrf_token();

        $rules = array(
            'firstname' => 'Required',
            'lastname' => 'Required',
            'email_address' => 'Required|email|unique:user_signup',
            'username' => 'Required',
            'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
            'confirmpassword' => 'Required|same:password',
            'targetrole' => 'Required',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->Fails()) {
            Session::flash('message', 'Data not saved');
            return Redirect::to('user')->withErrors($validator)->withInput();


        } else {
            $confirmation_code = str_random(30);
            if ($token == Input::get('_token')) {
                $data = new UserSignup();
                $data->first_name = Input::get('firstname');
                $data->middle_name = Input::get('middlename');
                $data->last_name = Input::get('lastname');
                $data->email_address = Input::get('email_address');
                $data->username = Input::get('username');
                $data->password = Hash::make(Input::get('password'));//dd($data->password);
                $data->targetrole = Input::get('targetrole');


                $data->confirmation_code = $confirmation_code;



                if ($data->save()) {
                    $email=$data->email_address;

                    Mail::send('admission::signup.verify', array('link' => $confirmation_code),  function($message) use ($email)
                    {
                        $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
                        $message->to($email);
                        $message->cc('tanintjt@gmail.com');
                        $message->subject('Notification');
                    });

                    return View::make('admission::signup.notification');

                } else {
                    Session::flash('message', 'not sending email. try again');

                    return Redirect::to('user')->with('message', 'Signup Here ');
                }
            }
        }
    }

    public function send_users_email()
    {
        $users = DB::table('user_signup')->select('email_address')->get();
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

        Mail::send('admission::signup.verify', array('link' => $confirmation_code),  function($message) use ($emailList)
        {
            $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
            $message->to($emailList);
            $message->cc('tanintjt@gmail.com');
            $message->subject('Notification');
        });
    }

    public function confirm($confirmation_code)
    {
        $user = UserSignup::where('confirmation_code','=',$confirmation_code);
        if($user->count())
        {
            $user = $user->first();
            $user->confirmation_code = '';
        }
        Session::flash('message','Your account activated successfully. You can signin now.');

        return Redirect::to('usersign/login');

    }

    public function Login()
    {
        return View::make('admission::signup.login');
    }


    public function UserLogin() {

//        $ip = getHostByName(getHostName());
//        echo $ip;
//        exit;

        $credentials = array(
            'email_address'=> Input::get('email'),
            'password'=>Input::get('password'),


        );
        //print_r($credentials);
       // exit;

        if(Auth::check()){
            $user_id = Auth::user()->username;
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

    public function Dashboard(){

        return View::make('admission::signup.dashboard');
    }


    public function usersLogout() {

        Auth::logout();
        return Redirect::to('usersign/login')->with('message', 'Your are now logged out!');


    }

    // method for password_reset view that contains email_address
    public function userPassword(){

       return View::make('admission::signup.password_reset');
       return Redirect::to('usersign/login');
   }

    //method for sending mail to user :forgot password
    public function userPasswordResetMail(){

        $rules = array(
            'email_address' => 'Required|email|exists:user_signup',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');

            return Redirect::back();
        }
        else{
            $email_address = Input::get('email_address');
            $users = DB::table('user_signup')->where('email_address', $email_address)->first();
            $user_id = $users->id;

            //random number with 30 character
            $reset_password_token = str_random(30);

            //convert date format
            date_default_timezone_set("Asia/Dacca");
            $reset_password_expire=date('Y-m-d h:i:s', time());;
            $reset_password_time=date('Y-m-d h:i:s', time());;

            $data = new ResetUserPassword();

            $data->user_id = $user_id;
            $data->reset_password_token = $reset_password_token;
            $data->reset_password_expire = $reset_password_expire;
            $data->reset_password_time = $reset_password_time;
            $data->status = "2"; // 2 == reset requested

            if($data->save())
            {

             Mail::send('admission::signup.password_reset_mail', array('link' =>$reset_password_token),  function($message) use ($email_address)
           {
              $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
              $message->to($email_address);
              $message->cc('tanintjt@gmail.com');
              $message->subject('Notification');

           });

            }
            return View::make('admission::signup.password_mail_notification');

        }
    }

    public function userPasswordResetConfirm($reset_password_token){

        $userReset = ResetUserPassword::where('reset_password_token', $reset_password_token)
                ->exists();
        if($userReset) {
            $user_reset_info = ResetUserPassword::select('id','user_id', 'reset_password_expire', 'status')
                ->where('reset_password_token', $reset_password_token)
                ->first();
            $reset_expire = $user_reset_info->reset_password_expire;
            $reset_status = $user_reset_info->status;
            $now = date('Y-m-d h:i:s', time());

            if ($reset_expire > $now && $reset_status == 2) {
                $model = ResetUserPassword::find($user_reset_info->id);
                $model->status = 0;
                if($model->save()){
                    return View::make('admission::signup.password_reset_form')
                        ->with('user_id', $user_reset_info->user_id );
                }else{
                    echo "Invalid!";
                }

            } else {
                echo "Session Expired!";
            }
        }
    }

    // get new password action
    public function userPasswordUpdate()
    {
        $users = Input::get('user_id');

        if ($users) {
            $data = UserSignup::find($users);
            $data->password = Hash::make(Input::get('password'));

            $data->save();
        }

    }

    // Methods for forgot username
    public function usernameReset(){

        return View::make('admission::signup.username_reset');
    }

    public  function usernameResetMail(){

        $rules = array(
            'email_address' => 'Required|email|exists:user_signup',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');

            return Redirect::back();

        }else{
                $userData = UserSignup::where('email_address', Input::get('email_address'))->first();
                $username = $userData->username;

                $email_address = Input::get('email_address');

                Mail::send('admission::signup.username_reset_mail', array('link' =>$username),  function($message) use ($email_address)
                {
                    $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
                    $message->to($email_address);
                    $message->cc('tanintjt@gmail.com');
                    $message->subject('Notification');

                });
        }

    }

    public function show($id)
	{
		//
	}

    public function edit($id)
	{
		//
	}

    public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
