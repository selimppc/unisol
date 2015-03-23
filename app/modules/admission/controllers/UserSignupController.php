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

        $model = Degree::latest('id')->paginate(5);
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
          return View::make('admission::amw.degree_management.degree.degree_index',
                    compact('model','department'));
        }else{
            return Redirect::to('admission/amw/degree');
        }
    }
 //{----------------------------------------------------- Waiver ----------------------------------------------------------------}

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
/*
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
*/

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

// {---------------------------------------------Batch Applicant----------------------------------------------------------------------}

    public function batchApplicantIndex($id){
        $model = new BatchApplicant();
        //view info according to batch(admission on)
        $batchApt = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDepartment','relYear','relSemester')
            ->where('id', '=', $id)
            ->first();
        //print_r($model);exit;
        $status = $model->getStatus();
        if($this->isPostRequest()){
            $arrayData = [
                'status' => Input::get('status'),
            ];
            $result = Helpers::search($arrayData, $model);
            if(! $result->isEmpty()){
                foreach($result as $value){
                    $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester');
                    $apt_data = $apt_data->where('batch_id','=', $value->batch_id);
                }
                $apt_data = $apt_data->get();
            }else{
                $apt_data = null;
            }
        }else{
            $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester')
                ->where('batch_id','=',$id)->get();
        }
        return View::make('admission::amw.batch_applicant.index',
            compact('batchApt','apt_data', 'status'));

     }

    public function batchApplicantChangeStatus($id){

        $model = BatchApplicant::findOrFail($id);
        $status = $model->getStatus();
        return View::make('admission::amw.batch_applicant.status',compact('status','model'));

    }

    public function  batchApplicantUpdateStatus($applicant_id){

        $model = BatchApplicant::find($applicant_id);
        //print_r($model);exit;
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

}
