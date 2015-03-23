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


    public function userAccess(){
        return View::make('layouts.user_access');
    }



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


        if($_POST){
            echo "ok";
        }else{
            echo "no";
        }
        exit;

        $result = BillingDetails::BillingItem();
        print_r($result);exit;

        $selectedApplicantListWithChoiceList  = [
            array('id' => 1,
                'clist' => array(2,1,4,3,6,5)),
            array('id' => 2,
                'clist' => array(1,3,2,6,5,4)),
            array('id' => 3,
                'clist' => array(3,1,2,4,5,6)),
        ];

        $centerListWithCurrentCapacity = [
            2 => array(
                'capacity' => 0),
            1 => array(
                'capacity' => 95),
            3 => array(
                'capacity' => 20),
            4 => array(
                'capacity' => 30),
            5 => array(
                'capacity' => 40),
            6 => array(
                'capacity' => 25),
        ];

        $helper = new Helpers();
        $b = $helper->selectCenter($selectedApplicantListWithChoiceList, $centerListWithCurrentCapacity);
        print_r($b);exit;







        $dept_id = "";
        $deg_id = 2;
        $sem_id = 1;
        $yr_id = null;

        $data = [
            //'id' => '1',
            'username' => 'a',
        ];

        //print_r($data);exit;
        $user = new User();
        $result = $user->search($data);

        print_r($result);exit;













        $model = CourseManagement::join('Degree', function($query) use($dept_id)
        {
            $query->on('degree.id', '=', 'course_management.degree_id');
            if(isset($dept_id) && !empty($dept_id)) $query->where('degree.department_id', '=', $dept_id);
        });
        if(isset($deg_id) && !empty($deg_id)) $model = $model->where('course_management.degree_id', '=', $deg_id);
        if(isset($sem_id) && !empty($sem_id)) $model = $model->where('course_management.semester_id','=',$sem_id);
        if(isset($yr_id) && !empty($yr_id)) $model = $model->where('course_management.year_id','=',$yr_id);
        $model = $model->get();
        print_r($model);exit;

        dd(DB::getQueryLog($model));

//        dd(DB::getQueryLog($result));
//        exit;

       // dd(DBH::q());exit;
        dd(DB::getQueryLog($result));

        print_r($result);
        exit;
    }

    //return back to modal with old data
    public function bootstrapModal(){
        return View::make('test.bootstrap_modal');
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($data = Input::all(), User::$rules);
        if ($validator->fails())
        {
            //return Redirect::back()->withErrors($validator)->withInput();
            return Redirect::back()->withErrors($validator)->withInput()->with('id', $id);
        }
        return View::make('test.bootstrap_modal');
    }


    //dependable drop-down list in this application

    public function dropDownForm(){
        return View::make('test.dropdown_form');
    }

    public function dropDownData(){
        $input = Input::get('option');
        $user_profile = UserProfile::where('user_id', '=', $input)->lists('first_name', 'id');
        if($user_profile){
            return Response::make(['please select one']+ $user_profile);
        }else{
            return Response::make(['no data found']);
        }
    }



    public function getFile(){

        $array = array('foo' => array('bar' => 'baz'));

        $array = array_dot($array);
        print_r($string = str_random(10));exit;

        $marks = [  95 => [1],
                    90 => [9,2,3],
                    85 => [8,2,3,4,5,6],
                    80 => [7,2,3,4,5,6-15]
                ];

        $result = [];
        $i = 0;
        foreach ($marks as $key => $val) {
            $j = 0;
            foreach ($val as $value) {
                if ($j == 0) {
                    $result[] = $value;
                    $j = 1;
                }
            }
            $i++;
        }
        print_r($result);
    }




    public function datePicker(){
        $batch_id = 1;
        $degree_id = Batch::findOrFail($batch_id)->degree_id;

        /*SELECT * FROM degree_course a
        LEFT JOIN batch_course b ON a.`course_id` = b.`course_id`
        WHERE a.`degree_id` = 1 AND b.course_id IS NULL*/

        $degreeCourse = DB::table('degree_course')
            ->leftJoin('batch_course', 'degree_course.course_id', '=', 'batch_course.course_id')
            ->leftjoin('degree', 'degree_course.degree_id', '=', 'degree.id' )
            ->where('degree_course.degree_id', '=', $degree_id)
            ->where('batch_course.course_id', NULL)
            ->select('degree_course.course_id', 'degree_course.degree_id', 'degree.department_id')
            ->get();

        print_r($degreeCourse);exit;


        if($_POST){
            $n = Input::get('factorial');
            $factorial = $this->bcFact($n);
            return View::make('test.date_picker', compact('factorial'));
        }else{
            return View::make('test.date_picker');
        }
    }

    protected function bcFact($n){
        $factorial=$n;
        while (--$n>1) $factorial = bcmul($factorial,$n);
        return $factorial;
    }

}
