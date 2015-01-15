<?php
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController {


	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function index()
    {
        //Session::flash('message', "Success Message: Successfully Saved !");
        //Session::flash('error', "Error Message: Invalid Request !");
        //Session::flash('info', "Info Message: Invalid Request !");
        //Session::flash('danger', "Warning: You are Lost ! Do not Laugh !!! He he he he !!");

        return View::make('test.index')->with('pageTitle','Welcome to ETSB!');
    }


    public function done()
    {
        return View::make('test.index')->with('title','Welcome to ETSB!');
    }



    /// Login System
    public function userCreate() {
        $user = new User;
        $user->username = 'selim1';
        $user->email_address = 'selim@selim.com';
        $user->password = Hash::make('123');
        $user->save();
    }

    public function userLogin() {
        return View::make('test.login')->with('pageTitle','Login!');

    }

    public function userSign(){

        $credentials = array(
            'username'=> Input::get('username'),
            'password'=>Input::get('password'),
        );

        if ( Auth::attempt($credentials) ) {
            return Redirect::to('user/dashboard')->with('pageTitle', 'Logged in!');
        } else {
            return Redirect::to('user/login')->with('pageTitle', 'Failed log in!');
        }
    }

    public function userDashboard() {

        $user_id = Auth::user()->username;
        //print_r($user_id);
        //exit;
        return View::make('test.dashboard', compact('user_id'));
    }

    public function userLogout() {
        Auth::logout();
        return Redirect::to('user/login');
    }

}
