<?php

use Illuminate\Support\Facades\Input;
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
//        echo "ok";
//        exit;
//        $rules = array(
//            'firstname' => 'required',
//            'lastname' => 'required',
//            'email' => 'required|unique:user_signup',
//            'username' => 'required',
//            'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,20})|required',
//            'confirmpassword' => 'required',
//            'targetrole' => 'required',
//
//        );
//
//        $validator = Validator::make(Input::all(), $rules);
//
//        if ($validator->passes()) {
//            $users = new UserSignup;
//            $users->firstname = Input::get('firstname');
//            $users->middlename = Input::get('middlename');
//            $users->lastname = Input::get('lastname');
//            $users->email = Input::get('email');
//            $users->username = Input::get('username');
//            $users->password = Input::get('password');
//            $users->targetrole = Input::get('targetrole');
//
//            $users->save();
//
//            return Redirect::back()->with('message', 'Thank you for your registration !');
//        } else {
//            return Redirect::to('user')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
//        }


        $token = csrf_token();
        //dd($token);
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



                    Mail::send('admission::signup.verify', array('link' =>URL::to('register/verify/',$confirmation_code), 'username' => Input::get('firstname')), function ($message) {
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

        $data = array
        (
            'message_var' => Input::get('message_details')
        );

        Mail::queue('admission::signup.verify', $data, function($message) use ($emailList)
      {
            $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
            $message->to($emailList);
            $message->cc('tanintjt@gmail.com');
            $message->subject('Notification');


        });
    }

    public function confirm($confirmation_code)
    {
        echo $confirmation_code;
        exit;
//        $user = User::where('confirmation_code','=',$confirmation_code);
//
//        if($user->count())
//        {
//            $user = $user->first();
//            $user->confirmation_code = ''; //after activation we don't need any confirmation code. make it blank
//
//            if($user->save())
//            {
//                Session::flash('message','Your account activated successfully. You can signin now.');
//                return Redirect::to("user")->with('message', 'Signup');
//            }
//        }
//
//        Session::flash('message','We cannot activate your account. Please try again.');
//        return Redirect::to('user')->with('message','Signup');


        if( ! $confirmation_code)
        {
            return Redirect::home();
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            return Redirect::back();
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::message('You have successfully verified your account. You can now login.');

//        return Redirect::route('login_path');



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
