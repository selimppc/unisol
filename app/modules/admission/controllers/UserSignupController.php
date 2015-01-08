<?php

class UserSignupController extends \BaseController {


	public function Userindex()
	{
        return View::make('admission::admission.signup.index');
	}

    public function create()
	{

	}

    public function Userstore()
	{
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:user_signup',
            'username' => 'required',
            'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,20})|required',
            'confirmpassword' => 'required',
            'targetrole' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $users = new UserSignup;
            $users->firstname = Input::get('firstname');
            $users->middlename = Input::get('middlename');
            $users->lastname = Input::get('lastname');
            $users->email = Input::get('email');
            $users->username = Input::get('username');
            $users->password = Input::get('password');
            $users->targetrole = Input::get('targetrole');

            $users->save();
            // return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Thank you for your registration !');
        } else {
            return Redirect::to('user')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
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
