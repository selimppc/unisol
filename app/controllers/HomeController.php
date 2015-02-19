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

        date_default_timezone_set("Asia/Dacca");
        $date = date('Y-m-d H:i:s', time());
        $shortFormat = strtotime($date);
        $expireDate = date("Y-m-d H:i:s", ($shortFormat+(60*5)));

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

        if (Auth::check()){
                $user_id = Auth::user()->username;
                $pageTitle = 'You are already logged in!';
                return View::make('test.dashboard', compact('user_id', 'pageTitle'));
        }else{
            if ( Auth::attempt($credentials) ) {
                return Redirect::to('user/dashboard')->with('pageTitle', 'Logged in!');
            } else {
                return Redirect::to('user/login')->with('pageTitle', 'Failed log in!');
            }
        }
    }


    public function userLogout() {
        Auth::logout();
        return Redirect::to('user/login');
    }

    public function userSignUp(){
        //$user_id = Auth::user()->username;
        $model = new User();
        $pageTitle = '';
        return View::make('test.user_sign_up', compact('model'));
    }

    public function userInfoStore(){
        $validation = Validator::make(Input::all(), array('title' => 'required', 'body' => 'required'));
            if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        echo "You are ok!";
    }


    public function testUserMeta(){
        //$userMeta = Usermeta::with('user')->get();
        $userMeta = Usermeta::all();
        return View::make('test.user_meta', compact('userMeta'));
    }


    public function logs(){

        return View::make('errors.missing');
        //$monolog = Log::getMonolog();
        //print_r($monolog);
    }


    public function testSearch(){
        $dept_id = 1;
        $deg_id = 2;
        $sem_id = 1;
        $yr_id = 4;

        $model = CourseManagement::join('Degree', function($query) use($dept_id)
        {
            $query->on('degree.id', '=', 'course_management.degree_id');
            $query->where('degree.department_id', '=', $dept_id);
        })
        ->where('course_management.degree_id', '=', $deg_id)
        ->where('course_management.semester_id','=',$sem_id)
        ->where('course_management.year_id','=',$yr_id)
        ->get();
        print_r($model);exit;

        print_r($model);exit;
        dd(DB::getQueryLog($model));

//        dd(DB::getQueryLog($result));
//        exit;

       // dd(DBH::q());exit;
        dd(DB::getQueryLog($result));

        print_r($result);
        exit;
    }


}
