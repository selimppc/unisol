<?php

//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Routing\Controller;

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
            'email' => 'Required|email|unique:user_signup',
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
                $data->firstname = Input::get('firstname');
                $data->middlename = Input::get('middlename');
                $data->lastname = Input::get('lastname');
                $data->email = Input::get('email');
                $data->username = Input::get('username');
                $data->password = Hash::make(Input::get('password'));//dd($data->password);
                $data->targetrole = Input::get('targetrole');


                $data->confirmation_code = $confirmation_code;

                if ($data->save()) {



                    Mail::send('admission::signup.verify', array('link' =>'ok', 'username' => Input::get('firstname')), function ($message) {
                        $message->to(Input::get('email'), Input::get('username'))->subject('Verify your email address');
                    });


                    Session::flash('message', "Thanks for signing up! Please check your email.");

                    return View::make('admission::signup.mailnotify');

                } else {
                    Session::flash('message', 'not sending email. try again');

                    return Redirect::to('user')->with('message', 'Signup Here ');
                }

            }
        }
    }


    public function send_users_email()
    {
        $users = DB::table('user_signup')->select('email')->get();
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

        return Redirect::to('user');

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
            'email'=> Input::get('email'),
            'password'=>Input::get('password'),
        );

        if(Auth::check()){
            $user_id = Auth::user()->username;
            $pageTitle = 'You are already logged in!';
            echo $pageTitle;
            //return View::make('usersign/dashboard', compact('user_id', 'pageTitle'));
        }else{
            if ( Auth::attempt($credentials) ) {
                return Redirect::to('usersign/dashboard')->with('message', 'Logged in!');
            } else {
                return Redirect::to('usersign/login') ->with('message', 'Your username/password combination was incorrect')
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


   public function userPassword(){

       return View::make('admission::signup.password_reset');
       return Redirect::to('usersign/login');
   }

    public function userPasswordConfirm(){


        $users = DB::table('user_signup')->select('email')->get();
        $emailList = array();
        foreach($users as $user)
        {
            $emailList[]=$user->email;
        }
        $reset_password_token = str_random(30);
        $data = array
        (
            'message_var' => Input::get('message_details')
        );

        Mail::send('admission::signup.password_reset_confirm', array('link' => $reset_password_token),  function($message) use ($emailList)
        {
            $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
            $message->to($emailList);
            $message->cc('tanintjt@gmail.com');
            $message->subject('Notification');

        });

      return View::make('admission::signup.password_reset_confirm');
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
