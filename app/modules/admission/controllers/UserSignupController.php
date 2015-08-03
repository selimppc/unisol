<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSignupController extends \BaseController {

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function Userindex()
	{
        $role_name = Role:: getRoleName();
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
        return View::make('admission::signup.index',compact('department','countryList','role_name'));
	}

    public function Userstore()
    {
        $input_data = Input::all();
        //model
        $model = new User();
        if($model->validate($input_data)) {
            $model->email = $input_data['email_address'];
            $model->username = $input_data['username'];
            $model->password = $input_data['password'];//dd($data->password);
            $model->csrf_token = $input_data['_token'];
            $model->department_id = $input_data['department_id'];
            $model->role_id = $input_data['role_id'];
            $model->verified_code = str_random(30);
            $model->ip_address = getHostByName(getHostName());
            $model->status = 1;
            if ($model->save()) {
                $model1 = new UserProfile();
                if($model1->validate($input_data)) {
                    $model1->user_id = $model->id;
                    $model1->first_name = Input::get('first_name');
                    $model1->middle_name = Input::get('middle_name');
                    $model1->last_name = Input::get('last_name');
                    $model1->date_of_birth = Input::get('date_of_birth');
                    $model1->gender = Input::get('gender');
                    $model1->city = Input::get('city');
                    $model1->state = Input::get('state');
                    $model1->country = Input::get('country_id');
                    $model1->zip_code = Input::get('zip_code');
                    $model1->save();
                    Session::flash('message', "Thanks for signing up! You can login now at <a href='user/login'><b>User Login</b></a>");
                    return Redirect::to('user-signup');
                }else{
                    Session::flash('danger', 'Invalid Request. Please Try Again.');
                    return Redirect::back();
                }
            }
        }else {
            Session::flash('danger', 'Please Try Again.');
            return Redirect::back();
        }

    }

    public function send_users_email()
    {
        $users = DB::table('user')->select('email')->get();
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


    public function UserLogin()
    {
        $credentials = array(
            'username'=> Input::get('username'),
            'password'=>Input::get('password'),
        );

        if(Auth::check()){
            $user_id = Auth::user()->get()->username;
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

    public function Dashboard()
    {
        return View::make('admission::signup.dashboard');
    }

    public function usersLogout()
    {
        $model= User::find(Auth::user()->id);
        date_default_timezone_set("Asia/Dacca");
        $time=date('Y-m-d h:i:s', time());;
        $model->last_visit = $time;
        $model->save();
        Auth::logout();
        return Redirect::to('usersign/login')->with('message', 'Your are now logged out!');

    }


   //********************** Forgot password Start(R) *****************************

    public function userPassword()
    {
       return View::make('admission::signup.password_reset');
    }

    public function userPasswordResetMail()
    {
        $rules = array(
            'email' => 'Required|email|exists:user',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->Fails()){
            Session::flash('message', 'This Email address does not exit');
            return Redirect::back();
        }else{
            $email_address = Input::get('email');
            $users = DB::table('user')->where('email', $email_address)->first();
            $user_id = $users->id;
            //random number with 30 character
            $reset_password_token = str_random(30);
            //convert date format
            date_default_timezone_set("Asia/Dacca");
            $date = date('Y-m-d H:i:s', time());
            $shortFormat = strtotime($date);
            $reset_password_expire = date("Y-m-d H:i:s", ($shortFormat+(60*5)));
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
             // $message->cc('tanintjt@gmail.com');
              $message->subject('Notification');

           });

            }
            Session::flash('message', 'Please Check Your Email For Further Process.');
            return View::make('admission::signup.password_reset');

        }
    }

  //forgot password : confirm
    public function userPasswordResetConfirm($reset_password_token)
    {
        $userReset = UserResetPassword::where('reset_password_token', $reset_password_token)
                ->exists();
        if($userReset) {
            $user_reset_info = UserResetPassword::select('id','user_id', 'reset_password_expire', 'status','reset_password_time')
                ->where('reset_password_token', $reset_password_token)
                ->first();
            $reset_expire = $user_reset_info->reset_password_expire;
            $reset_time=$user_reset_info->reset_password_time;
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

    // forgot password: get new password action
    public function userPasswordUpdate()
    {
        $users = Input::get('id');
        if ($users) {

            $model = User::findOrFail($users);
            $model->password = Input::get('password');
            $model->save();
        }

        Session::flash('message','Your have got your password successfully. You may signin now.');
        return Redirect::route('user/login');

    }

//*********************Forgot UserName Start(R)***********************************

    public function usernameReset()
    {
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
                $userData = User::where('email', Input::get('email'))->first();
                $username = $userData->username;
                $email_address = Input::get('email');
                Mail::send('admission::signup.username_reset_mail', array('link' =>$username),  function($message) use ($email_address)
                {
                    $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
                    $message->to($email_address);
                   // $message->cc('tanintjt@gmail.com');
                    $message->subject('Notification');

                });
        }
        Session::flash('message', 'We Have Send Your UserName to Your Email Address.Please Check Your Email.');
        return View::make('admission::signup.username_reset');
    }

   // user password_change view method
    public function userResetPassword(){

        return View::make('admission::signup.username_reset');
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
 {------------------- Version:2 ->Admission--> Degree ------------------------------------}
 */
    public function admDegreeIndex(){

        $model = Degree::latest('id')->paginate(5);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        return View::make('admission::amw.degree.degree.degree_index',
                  compact('model','department'));
        }

    public function admDegreeCreate()
    {
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        return View::make('admission::amw.degree.degree._form',
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
        return View::make('admission::amw.degree.degree.degree_show',compact('model'));
    }

    public function admDegreeEdit($id)
    {
        $model = Degree::find($id);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        return View::make('admission::amw.degree.degree.degree_edit',
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
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function admDegreeSearch()
    {
        $searchQuery = $department_id = Input::get('search_department');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        if($searchQuery){

          $model = Degree::with(['relDepartment'])->where('department_id', '=', $searchQuery)->paginate(5);
          return View::make('admission::amw.degree.degree.degree_index',
                    compact('model','department'));
        }else{
            return Redirect::to('admission/amw/degree');
        }
    }
 //{----------------- Waiver ----------------------------------------------------------------}

    //TODO : Add Billing Details.............

    public function admWaiverIndex()
    {
        $waiver_model =Waiver::latest('id')->paginate(15);
        return View::make('admission::amw.waiver.index',
                  compact('waiver_model'));

    }
    public function admWaiverCreate()
    {
        //$billing_item = BillingDetails::BillingItem();
        return View::make('admission::amw.waiver.waiver_modals._form');
    }

    public function admWaiverStore(){
        $data = Input::all();
        $model = new Waiver();

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

    public function admWaiverShow($id)
    {
        $waiver_model = Waiver::find($id);
        return View::make('admission::amw.waiver.waiver_modals.show',compact('waiver_model'));
    }

    public function  admWaiverEdit($id)
    {
        $waiver_model = Waiver::findOrFail($id);
        return View::make('admission::amw.waiver.waiver_modals.edit',
                  compact('model','batch','waiver_model'));
    }

    public function admWaiverUpdate($id)
    {
        $model = Waiver::find($id);
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

    public function admWaiverDelete($id)
    {
        try {
            Waiver::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }


//{------------------------------------ Batch Waiver --------------------------------------------------------------------------}

    public function batchWaiverIndex($batch_id){

        $model = Batch::find($batch_id);
        $batch_info = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDepartment','relYear','relSemester','relDegree')
            ->where('id', '=', $batch_id)
            ->first();

        $waiver_info = BatchWaiver::with('relWaiver', 'relWaiverConstraint')->where('batch_id','=',$batch_id)->get();

        return View::make('admission::amw.batch_waiver.index',
                  compact('model','batch_info','waiver_info'));
    }

    public function batchWaiverCreate($batch_id)

    {
        $waiverList = array('' => 'Select Waiver Item ') + Waiver::lists('title','id');
        return View::make('admission::amw.batch_waiver.waiver_form',
            compact('waiverList','batch_id'));

    }
    public function batchWaiverStore(){

        $model = new BatchWaiver();
        $model->batch_id = Input::get('batch_id');
        $model->waiver_id = Input::get('waiver_id');

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        }
    }
    public function batchWaiverDelete($batch_id)
    {
        try {
            BatchWaiver::find($batch_id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

//{----------------------------------Waiver Constraint---------------------------------------------------------------------}
    public function waiverConstraintIndex($batch_id, $waiver_id){

        $batch_waiver_id = BatchWaiver::where('batch_id', '=', $batch_id)
            ->where('waiver_id', '=', $waiver_id)
            ->first()->id;

        $batchWaiver = BatchWaiver::with('relWaiver')
                 ->where('batch_id', '=', $batch_id)
                 ->where('waiver_id', '=', $waiver_id)->first();

        $timeDependent = WaiverConstraint::where('batch_waiver_id','=',$batch_waiver_id)
            ->where('is_time_dependent','=', 1)->get();
        $gpaDependent = WaiverConstraint::where('batch_waiver_id','=',$batch_waiver_id)
            ->where('is_time_dependent','=', 0)->get();
        //print_r($waiverConstraint);exit;
        return View::make('admission::amw.waiver_constraint.index', compact('batch_waiver_id', 'batchWaiver','timeDependent', 'gpaDependent'));
    }

    public function waiverTimeConstCreate($batch_waiver_id){

        return View::make('admission::amw.waiver_constraint.add_time_constraint',
            compact('batch_waiver_id'));
    }

    public function waiverGpaConstCreate($batch_waiver_id){

        return View::make('admission::amw.waiver_constraint.add_gpa_constraint',
            compact('batch_waiver_id'));
    }


    public function waiverConstraintStore(){
        $data = Input::all();
        $model = new WaiverConstraint();
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

    public function waiverTimeConstEdit($id){

        $timeDependent = WaiverConstraint::find($id);

        return View::make('admission::amw.waiver_constraint.edit_time_constraint',
            compact('timeDependent'));

    }

    public function waiverGpaConstEdit($id){

        $gpaDependent = WaiverConstraint::find($id);

        return View::make('admission::amw.waiver_constraint.edit_gpa_constraint',
            compact('gpaDependent'));

    }

    public function waiverConstUpdate($id){

        $const_model = WaiverConstraint::find($id);
        $data = Input::all();

        $const_model->fill($data);

        if ($const_model->update($data)) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
    }

    public function waiverConstDelete($id){

        WaiverConstraint::find($id)->delete();
        return Redirect::back()
            ->with('message', 'Successfully deleted Information!');
    }

//{--------------------------------- Batch Education Constraint -------------------------------------------------------------------------------------}

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

    public function admBatchEduConstShow($id)
    {
        $model = BatchEducationConstraint::find($id);
        return View::make('admission::amw.batch_edu_const.edu_const_show',compact('model'));
    }

    public function  admBatchEduConstEdit($id)
    {
        $model = BatchEducationConstraint::findOrFail($id);
        $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        return View::make('admission::amw.batch_edu_const.edu_const_edit',
                  compact('model','batch'));
    }

    public function admBatchEduConstUpdate($id)
    {
        $model = BatchEducationConstraint::find($id);
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

    public function admBatchEduConstDelete($id)
    {
        try {
            BatchEducationConstraint::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

// {-----------------  Batch Applicant    ----------------------------------------------------------------------}

    public function batchApplicantIndex($batch_id){
        $model = new BatchApplicant();

        //view info according to batch(admission on)
        $batchApt = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDepartment','relYear','relSemester')
            ->where('id', '=', $batch_id)
            ->first();
        $status =  $model->getStatus();
        if($this->isPostRequest()){
                $chk_status = Input::get('status');
            if($chk_status != null){
                $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester');
                $apt_data = $apt_data->where('batch_id','=', $batch_id);
                $apt_data = $apt_data->where('status','=', $chk_status);
                $apt_data = $apt_data->get();
            }else{
                $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester')
                    ->where('batch_id','=',$batch_id)->get();
            }
        }else{
            $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester')
                ->where('batch_id','=',$batch_id)->get();
        }
        return View::make('admission::amw.batch_applicant.index',
            compact('batch_id', 'batchApt','apt_data', 'status'));

     }

    public function batchApplicantChangeStatus($id){

            $model = BatchApplicant::findOrFail($id);
            $status = $model->getStatus();
            return View::make('admission::amw.batch_applicant.status',compact('status','model'));

    }

    public function  batchApplicantUpdateStatus($applicant_id){

            $model = BatchApplicant::find($applicant_id);
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
    public function batchApplicantApply($id){

            $ids = Input::get('ids');
            $status = Input::get('status');

            foreach($ids as $key => $value){
                $model = BatchApplicant::findOrFail($value);
                $model->status = $status;
                $model->save();
            }
            Session::flash('message','Successfully Updated applicant Status!');
            return Redirect::back();
    }


    public function batchApplicantView($id,$batch_id,$applicant_id){
            $model = BatchApplicant::findOrFail($id);
            $status = $model->getStatus();

            $applicant_account_info = Applicant::where('id','=',$applicant_id)->first();
            $applicant_profile_info = ApplicantProfile::with('relCountry')->where('applicant_id', '=',$applicant_id )->first();
            $applicant_acm_records =  ApplicantAcademicRecords::where('applicant_id','=',$applicant_id)->get();
            $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();
            $applicant_extra_curr_activities = ApplicantExtraCurrActivity::where('applicant_id','=',$applicant_id)->get();
            $supporting_docs = ApplicantSupportingDoc::where('applicant_id','=',$applicant_id)->first();
            $miscellaneous_info = ApplicantMiscInfo::where('applicant_id','=',$applicant_id)->first();

            if($applicant_account_info == Null){
                Session::flash('info', "Applicant's Account information is missing !");
            }
            if($applicant_profile_info == Null) {
                Session::flash('info', "Applicant's Profile information is missing !");
            }
            if($applicant_meta_records == Null){
                Session::flash('danger', "Applicant's Biographical information is missing !");
            }
            if(count($applicant_acm_records)< 2) {
                Session::flash('error', "Academic Records are incomplete !");
            }
            if(count($applicant_extra_curr_activities)< 1) {
                Session::flash('info', "Applicant's Extra Curricular Activities Do Not Added !");
            }

            return View::make('admission::amw.batch_applicant.view_applicant_info',
                compact('applicant_id','batch_id','applicant_account_info', 'applicant_profile_info',
                        'applicant_acm_records','applicant_meta_records','applicant_extra_curr_activities',
                        'supporting_docs','miscellaneous_info','status','model'));
    }

}
