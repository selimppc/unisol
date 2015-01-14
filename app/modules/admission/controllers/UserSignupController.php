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


//        $rules = [
//            'username' => 'required',
//            'email' => 'required',
//            'password' => 'required'
//        ];
//
//        $validator = Validator::make(Input::only('username', 'email', 'password', 'password_confirmation'), $rules);
//
//        if($validator->fails())
//        {
//            return Redirect::back()->withInput()->withErrors($validator);
//        }
//
//        $confirmation_code = str_random(30);
//
//        UserSignup::create([
//            'username' => Input::get('username'),
//            'email' => Input::get('email'),
//            'password' => Hash::make(Input::get('password')),
//            'confirmation_code' => $confirmation_code
//        ]);
//
//        Mail::send('admission::signup.verify', compact('confirmation_code'), function($message) {
//            $message->to(Input::get('email'), Input::get('username'))->subject('Verify your email address');
//        });
//
//        Session::Flash('message','Thanks for signing up! Please check your email and follow the instructions to complete the sign up process');
//
//        return Redirect::back();



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
        $user = User::where('confirmation_code','=',$confirmation_code);

        if($user->count())
        {
            $user = $user->first();
            $user->confirmation_code = ''; //after activation we don't need any confirmation code. make it blank


        }

        Session::flash('message','Your account activated successfully. You can signin now.');
        //return Redirect::to('signup')->with('title','Signup');
        return View::make('admission::signup.mailnotify');




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
