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

            'email_address' => 'Required|email|unique:user',
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
            $verified_code = str_random(30);
            if ($token == Input::get('_token')) {
                $data = new User();

                $data->email_address = Input::get('email_address');
                $data->username = Input::get('username');
                $data->password = Hash::make(Input::get('password'));//dd($data->password);
                $data->user_type = Input::get('targetrole');


                $data->verified_code = $verified_code;

                if ($data->save()) {
                    $email=$data->email_address;

                    Mail::send('admission::signup.verify', array('link' => $verified_code),  function($message) use ($email)
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
        $users = DB::table('user')->select('email_address')->get();
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
        return View::make('admission::signup.login');
    }


    public function UserLogin() {

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
                return Redirect::to('usersign/login') ->with('message', 'Your username/password combination was incorrect! Please try again....')
                    ->withInput();
            }
        }
    }

    public function Dashboard(){

        return View::make('admission::signup.dashboard');
    }

    public function usersLogout() {

        $model= User::find(Auth::user()->id);

        date_default_timezone_set("Asia/Dacca");
        $time=date('Y-m-d h:i:s', time());;
        $model->last_visit = $time;
        $model->save();
        Auth::logout();

        return Redirect::to('usersign/login')->with('message', 'Your are now logged out!');

    }

    // method for password_reset view that contains email_address
    public function userPassword(){

       return View::make('admission::signup.password_reset');
    }

    //forgot password: method for sending mail to user
    public function userPasswordResetMail(){

        $rules = array(
            'email' => 'Required|email|exists:user',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');

            return Redirect::back();
        }
        else{
            $email_address = Input::get('email_address');
            $users = DB::table('user')->where('email', $email_address)->first();
            $user_id = $users->id;

            //random number with 30 character
            $reset_password_token = str_random(30);

            //convert date format
            date_default_timezone_set("Asia/Dacca");
            $reset_password_expire=date('Y-m-d h:i:s',strtotime("+30 min"));;
            //echo $reset_password_expire;
            //exit;
            $reset_password_time=date('Y-m-d h:i:s', time());;

            $data = new UserResetPassword();

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

        $userReset = UserResetPassword::where('reset_password_token', $reset_password_token)
                ->exists();
        if($userReset) {
            $user_reset_info = UserResetPassword::select('id','user_id', 'reset_password_expire', 'status','reset_password_time')
                ->where('reset_password_token', $reset_password_token)
                ->first();
            $reset_expire = $user_reset_info->reset_password_expire;
            $reset_time=$user_reset_info->reset_password_time;
            //echo $reset_expire;
            //exit;
            $reset_status = $user_reset_info->status;
           // $now = date('Y-m-d h:i:s', time());

            if ($reset_expire > $reset_time && $reset_status == 2) {
                $model = UserResetPassword::find($user_reset_info->id);
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
            $data = User::find($users);
            $data->password = Hash::make(Input::get('password'));

            $data->save();
        }

        Session::flash('message','Your have got your password successfully. You may signin now.');
        return View::make('admission::signup.login');

    }

    // Methods for forgot username
    public function usernameReset(){

        return View::make('admission::signup.username_reset');
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
                $userData = User::where('email', Input::get('email_address'))->first();
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
        return View::make('admission::signup.username_mail_notification');
    }

   // user password_change view method
    public function userResetPassword(){

        return View::make('admission::reset_password.reset_password_form');
    }

    // user password_change method
    public function userResetPasswordUpdate()
    {

        $model= User::find(Auth::user()->id);

        $old_password = Input::get('old_password');

        $user_password = Auth::user()->password;

        if(Hash::check($old_password, $user_password)){

            //validation
            $rules = array(

                'new_password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
                'confirm_password' => 'Required|same:new_password',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->Fails()) {
                Session::flash('message', 'Invalid!!');

                return Redirect::back()->withErrors($validator)->withInput();
            } else{
                $model->password = Hash::make(Input::get('new_password'));

                if($model->save()){

                    Session::flash('message','You have changed your password successfully. You may signin now.');
                    return View::make('admission::signup.login');
                }
                else{
                    echo "data do not saved!!!";
                }
            }
        }else{
            Session::flash('message','Password does not match. Please try again!');

            return Redirect::back();
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

/*
 {--------------------------------- Version:2 ->Admission -->Degree ------------------------------------}
 */

    public function admDegreeIndex(){

        $model = Degree::orderby('id', 'DESC')->paginate(5);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        return View::make('admission::amw.degree_management.degree.degree_index',
            compact('model','department'));
    }

    public function admDegreeCreate()
    {
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        return View::make('admission::amw.degree_management.degree._form',
                  compact('department','degree_program','degree_group'));
    }

    public function admDegreeStore()
    {
        $data = Input::all();
        $model = new Degree();

        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function admDegreeShow($id)
    {
        $model = Degree::find($id);
        return View::make('admission::amw.degree_management.degree.degree_show',compact('model'));
    }

    public function admDegreeEdit($id)
    {
        $model = Degree::find($id);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        return View::make('admission::amw.degree_management.degree.degree_edit',
                  compact('model','department','degree_program','degree_group'));
    }

    public function admDegreeUpdate($id)
    {
        $model = Degree::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message','Successfully Updated Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function admDegreeDelete($id)
    {
        try {
            Degree::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
    //TODO Searching............

    public function admDegreeSearch(){

        $searchQuery = [
            $department_id = Input::get('search_department')
        ];

        //echo $dep_id;exit;
        $model = new Degree();
        $result = Helpers::search($searchQuery, $model);
        //print_r($result) ;exit;

        $dep_data = '';

        foreach($result as $value){
            $model = Degree::with( 'relDepartment' )->where('department_id', '=', $value);
            $dep_data[] = $model->get();
        }
    }

//{------------------------------------ Degree Waiver --------------------------------------------------------------------------}

    public function admBatchWaiverIndex(){

        $model = BatchWaiver::latest('id')->paginate(5);

        return View::make('admission::amw.batch_waiver.batch_waiver_index',
                  compact('model'));
    }

    public function  admBatchWaiverCreate()
    {
        $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        $waiver = array('' => 'Select Waiver ') + Waiver::lists('title', 'id');

        return View::make('admission::amw.batch_waiver.batch_waiver_form',
                  compact('batch','waiver'));
    }

    public function admBatchWaiverStore()
    {
        $data = Input::all();
        $model = new BatchWaiver();

        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function admBatchWaiverShow($id)
    {
        $model = BatchWaiver::find($id);
        return View::make('admission::amw.batch_waiver.batch_waiver_show',compact('model'));
    }

    public function  admBatchWaiverEdit($id)
    {
        $model = BatchWaiver::findOrFail($id);
        $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        $waiver = array('' => 'Select Waiver ') + Waiver::lists('title', 'id');
        return View::make('admission::amw.batch_waiver.batch_waiver_edit',
                  compact('model','batch','waiver'));
    }

    public function admBatchWaiverUpdate($id)
    {
        $model = BatchWaiver::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message','Successfully Updated Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function admBatchWaiverDelete($id)
    {
        try {
            BatchWaiver::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function admBatchEduConstIndex(){
        $model = BatchEducationConstraint::latest('id')->paginate(5);

        return View::make('admission::amw.batch_edu_const.index',
                  compact('model'));
    }
    public function admBatchEduConstCreate()
    {
       $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        return View::make('admission::amw.batch_edu_const.edu_const_form',
            compact('batch'));
    }

    public function admBatchEduConstStore()
    {
        $data = Input::all();
        //print_r($data);exit;
        $model = new BatchEducationConstraint();

        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
            }else{
                Session::flash('message','Invalid Request!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }
}
