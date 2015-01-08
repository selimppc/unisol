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
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
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
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('user')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
	}


	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
