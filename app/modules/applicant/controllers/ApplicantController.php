<?php
class ApplicantController extends \BaseController
{


//**************************Applicant Sign Up Start(R)***********************

    public  function signup()
    {

        return View::make('applicant::signup.signup');
    }

    public function applicant_signup_data_save()
    {
        $token = csrf_token();
        $rules = array(
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:applicant',
            'username' => 'required|unique:applicant',
            'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
            'confirm_password' => 'Required|same:password',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->Fails()) {
            //Session::flash('message', 'Data Not saved');
            return Redirect::to('/applicant/registration')->withErrors($validator)->withInput();
        } else {
            $verified_code = str_random(30);
            if ($token == Input::get('_token')) {
                $data = new Applicant();
                $data->first_name = Input::get('first_name');
                $data->middle_name = Input::get('middle_name');
                $data->last_name = Input::get('last_name');
                $data->email = Input::get('email');
                $data->username = Input::get('username');
                $data->csrf_token = Input::get('_token');
                $data->password = Hash::make(Input::get('password'));//dd($data->password);
                $data->verified_code = $verified_code;

                if ($data->save()) {
                    $email=$data->email;
                    Mail::send('applicant::signup.authentication', array('link' => $verified_code,'username' => Input::get('first_name')), function($message) use ($email)
                    {
                        $message->from('test@edutechsolutionsbd.com', 'Email Verification');
                        $message->to($email, Input::get('username'));
                        $message->cc('ratnaakter17@gmail.com');
                        $message->subject('Notification');
                    });
                    //return View::make('applicant::signup.mail_notification');
                    Session::flash('message', 'Thanks for signing up! Please check your email.');
                    return Redirect::to('/applicant/registration');
                } else {
                    Session::flash('danger', 'Please try again');
                    return Redirect::to('/applicant/registration');

                }
            }
        }
    }

    public function applicant_signup_confirm($verified_code)
    {
        $user = Applicant::where('verified_code','=',$verified_code);
        if($user->count())
        {
            $user = $user->first();
            $user->verified_code = '';
        }
        Session::flash('message','Your account activated successfully. You can sign in now.');
        return View::make('user::user.login');

    }
    public function Login()
    {
        return View::make('applicant::applicant.login');
    }

//**************************Applicant Change password Start(R)***********************

    public function applicant_change_password()
    {
        return View::make('applicant::signup.change_password');
    }

    public function applicant_change_password_update()
    {
        if(Auth::applicant()->check()) {
            $model = Applicant::findOrFail(Auth::applicant()->get()->id);
            $old_password = Input::get('password');
            $user_password = Auth::applicant()->get()->password;
            if (Hash::check($old_password, $user_password))
            {
                $rules = array(
                    'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
                    'confirm_password' => 'Required|same:password',
                );
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->passes()) {
                    $model->password = Hash::make(Input::get('new_password'));
                    $model->save();
                    return Redirect::to('applicant/change/password')->with('message', 'Password Successfully Updated.');
                } else {
                    return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
                }
            }
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }


//**********************Applicant's User Account Info Start(R)****************************

    public  function userAccountInfoIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant = Auth::applicant()->get()->id;
            $account = Applicant::where('id', '=', $applicant)->first();
            return View::make('applicant::applicant.user_account_index', compact('account','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }

    public function userAccountEdit($id)
    {
        $account = Applicant::find($id);
        return View::make('applicant::applicant.edit', compact('account'));
    }

    public  function userAccountUpdate($id)
    {
        if(Auth::applicant()->check()) {
            $rules = array(
               // 'email' => 'required|email|unique:applicant',
               // 'username' => 'required|unique:applicant',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                DB::beginTransaction();
                try{
                    $account = Applicant::find($id);
                    $account->id = Auth::applicant()->get()->id;
                    $account->first_name = Input::get('first_name');
                    $fflasmsg = $account->first_name;
                    $account->middle_name = Input::get('middle_name');
                    $mflashmsg = $account->middle_name;
                    $account->last_name = Input::get('last_name');
                    $lflashmsg= $account->last_name;
                    $account->username = Input::get('username');
                    $Uflashmsg = $account->username;
                    $account->email = Input::get('email');
                    $Eflashmsg = $account->email;
                    $account->save();
                    DB::commit();
                    return Redirect::back()->with('message', "Successfully Updated FirstName:$fflasmsg, MiddleName:$mflashmsg, LastName:$lflashmsg, UserName:$Uflashmsg, Email:$Eflashmsg !");
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', " Information is not added.Invalid Request !");
                }
                return Redirect::back();
            }
            else {
                return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
            }
            }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }


//**********************Applicant's Profile Start(R)*********************************

    public function applicantProfileIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant = Auth::applicant()->get()->id;
            $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
            $profile = ApplicantProfile::where('applicant_id', '=', $applicant)->first();
            return View::make('applicant::applicant_profile.index', compact('profile', 'countryList'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }
    public function applicantProfileStore()
    {
        if(Auth::applicant()->check()) {
            $data = Input::all();
            $applicant_model = new ApplicantProfile();
            if ($applicant_model->validate($data)) {
                DB::beginTransaction();
                try{
                $applicant_model->applicant_id = Auth::applicant()->get()->id;
                $FlashMsg= Auth::applicant()->get()->username ;
                $applicant_model->date_of_birth = Input::get('date_of_birth');
                $applicant_model->place_of_birth = Input::get('place_of_birth');
                $applicant_model->gender = Input::get('gender');

                $imagefile = Input::file('profile_image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/applicant_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $applicant_model->profile_image = $file;

                $applicant_model->city = Input::get('city');
                $applicant_model->state = Input::get('state');
                $applicant_model->country_id = Input::get('country_id');
                $applicant_model->zip_code = Input::get('zip_code');
                $applicant_model->phone = Input::get('phone');
                $applicant_model->save();
                DB::commit();
                return Redirect::back()->with('message', "Successfully Added Infomation to
                 $FlashMsg Profile !");
                }
                catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Information is not added.Invalid Request !");
                }
                return Redirect::back();
            }
            else {
                return Redirect::back()->with('error', "Data Not Saved !");
            }
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }

    public function editApplicantProfile($id)
    {
        $profile = ApplicantProfile::find($id);
        $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
        return View::make('applicant::applicant_profile.edit', compact('profile','countryList'));

    }
    public function updateApplicantProfile($id)
    {
        if(Auth::applicant()->check()) {
            $rules = array(
                'date_of_birth' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                DB::beginTransaction();
                try {
                    $applicant_model = ApplicantProfile::find($id);
                    $applicant_model->applicant_id = Auth::applicant()->get()->id;
                    $FlashMsg= Auth::applicant()->get()->username ;
                    $applicant_model->date_of_birth = Input::get('date_of_birth');
                    $applicant_model->place_of_birth = Input::get('place_of_birth');
                    $applicant_model->gender = Input::get('gender');

                    $imagefile = Input::file('profile_image');
                    $extension = $imagefile->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $file = strtolower($filename);
                    $path = public_path("/applicant_images/profile/" . $file);
                    Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);

                    $applicant_model->profile_image = $file;
                    $applicant_model->city = Input::get('city');
                    $applicant_model->state = Input::get('state');
                    $applicant_model->country_id = Input::get('country_id');
                    $applicant_model->zip_code = Input::get('zip_code');
                    $applicant_model->phone = Input::get('phone');
                    $applicant_model->save();
                    DB::commit();
                    return Redirect::back()->with('message', "Successfully Updated Infomation to $FlashMsg Profile !");
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', "$FlashMsg Profile Information is not added.Invalid Request !");
                }
                return Redirect::back();
            }
            else {
                return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }
    public function editProfileImage($id)
    {
        $profile = ApplicantProfile::find($id);
        return View::make('applicant::applicant_profile.edit_image', compact('profile'));
    }

    public function updateProfileImage($id)
    {
        $rules = array(
            'profile_image' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $profile = ApplicantProfile::find($id);
                $FlashMsg= Auth::applicant()->get()->username ;
                $imagefile = Input::file('profile_image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/applicant_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $profile->profile_image = $file;
                $profile->save();
                DB::commit();
                return Redirect::back()->with('message', "Successfully Updated $FlashMsg Profile Picture !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Information is not added.Invalid Request !");
            }
            return Redirect::back();

        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

//********************Applicant Academic Records Start(R)******************************

    public function acmRecordsIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant= Auth::applicant()->get()->id;
            $model = ApplicantAcademicRecords::where('applicant_id', '=', $applicant)->get();
            return View::make('applicant::apt_academic_records.index', compact('model','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }

//!!!!!!!Academic records code for save and update is in  AdmPublicController!!!!!!!!!!

    public function acmRecordsStore(){

        $rules = array(
            'level_of_education' => 'required',
            'degree_name' => 'required',
            'institute_name' => 'required',
            'academic_group' => 'required',
            'board_type' => 'required',
            'major_subject' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $model =new ApplicantAcademicRecords();
            $model->applicant_id = Auth::applicant()->get()->id;
            $model->level_of_education = Input::get('level_of_education');
            $model->degree_name = Input::get('degree_name');
            $model->institute_name = Input::get('institute_name');
            $model->academic_group = Input::get('academic_group');

            //save board or university according to board_type
            $model->board_type = Input::get('board_type');

            if($model->board_type == 'board')
                $board_university = Input::get('board_university_board');
            if($model->board_type == 'university')
                $board_university = Input::get('board_university_university');
            if($model->board_type == 'other')
                $board_university = Input::get('board_university_other');

            $model->board_university = $board_university;

            $model->major_subject = Input::get('major_subject');
            $model->result_type = Input::get('result_type');

            $model->result = Input::get('result');
            $model->gpa = Input::get('gpa');
            $model->gpa_scale = Input::get('gpa_scale');
            $model->roll_number = Input::get('roll_number');
            $model->registration_number = Input::get('registration_number');
            $model->year_of_passing = Input::get('year_of_passing');
            $model->duration = Input::get('duration');
            $model->study_at = Input::get('study_at');

            $model->save();
            //echo $model;
            //return Redirect::back()->with('message', 'Successfully added Information!');
            return Redirect::to('apt/acm_records/')->with('message', 'successfully added');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }
    public function acmRecordsEdit($id){
        $model= ApplicantAcademicRecords::find($id);
        return View::make('applicant::apt_academic_records.modals.edit', compact('model'));
    }
    public function acmRecordsUpdate($id){
        $rules = array(
            'level_of_education' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $model = ApplicantAcademicRecords::find($id);
            $model->level_of_education = Input::get('level_of_education');
            $model->degree_name = Input::get('degree_name');
            $model->institute_name = Input::get('institute_name');
            $model->academic_group = Input::get('academic_group');
            //update board or university according to board_type
            $model->board_type = Input::get('board_type');
            if($model->board_type == 'board')
                $board_university = Input::get('board_university_board');
            if($model->board_type == 'university')
                $board_university = Input::get('board_university_university');
            if($model->board_type == 'other')
                $board_university = Input::get('board_university_other');

            $model->board_university = $board_university;

            $model->major_subject = Input::get('major_subject');
            $model->result_type = Input::get('result_type');
            $model->result = Input::get('result');
            $model->gpa = Input::get('gpa');
            $model->gpa_scale = Input::get('gpa_scale');
            $model->roll_number = Input::get('roll_number');
            $model->registration_number = Input::get('registration_number');
            $model->year_of_passing = Input::get('year_of_passing');
            $model->duration = Input::get('duration');
            $model->study_at = Input::get('study_at');
            $model->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }
    public function acmRecordsShow($id)
    {
        $model = ApplicantAcademicRecords::find($id);
        return View::make('applicant::apt_academic_records.modals.show',compact('model'));
    }
    public function academicDelete($id){

        ApplicantAcademicRecords::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }


//**************************Applicant Meta Information/Personal Info Start(R)*********

    public function personalInfoIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant = Auth::applicant()->get()->id;
            $applicant_personal_info = ApplicantMeta::where('applicant_id', '=',$applicant )
                ->first();
            return View::make('applicant::applicant_personal_info.index',compact('applicant_personal_info','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }

    public function personalInfoCreate(){
        return View::make('applicant::applicant_personal_info._form');
    }

    public function personalInfoStore()
    {
        $rules = array(
            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try{
            $applicant_personal_info =new ApplicantMeta();
            $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
            $FlashMsg= Auth::applicant()->get()->username ;
            $applicant_personal_info->fathers_name = Input::get('fathers_name');
            $applicant_personal_info->mothers_name = Input::get('mothers_name');
            $applicant_personal_info->fathers_occupation = Input::get('fathers_occupation');
            $applicant_personal_info->fathers_phone = Input::get('fathers_phone');
            $applicant_personal_info->freedom_fighter = Input::get('freedom_fighter');
            $applicant_personal_info->mothers_occupation = Input::get('mothers_occupation');
            $applicant_personal_info->mothers_phone = Input::get('mothers_phone');
            $applicant_personal_info->national_id = Input::get('national_id');
            $applicant_personal_info->driving_licence = Input::get('driving_licence');
            $applicant_personal_info->passport = Input::get('passport');
            $applicant_personal_info->national_id = Input::get('national_id');
            $applicant_personal_info->marital_status = Input::get('marital_status');
            $applicant_personal_info->religion = Input::get('religion');

            $imagefile = Input::file('signature');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/applicant_images/app_meta/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $applicant_personal_info->signature  = $file;

            $applicant_personal_info->present_address = Input::get('present_address');
            $applicant_personal_info->permanent_address = Input::get('permanent_address');
            $applicant_personal_info->save();
            DB::commit();
            return Redirect::back()->with('message', "Successfully Added $FlashMsg Personal Information !");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " $FlashMsg Personal Information  is not added.Invalid Request !");
            }
            return Redirect::back();
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function personalInfoEdit($id){
        $applicant_personal_info = ApplicantMeta::find($id);
        return View::make('applicant::applicant_personal_info.edit', compact('applicant_personal_info'));
    }
    public function personalInfoUpdate($id){
        $rules = array(
            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $applicant_personal_info = ApplicantMeta::find($id);
                $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
                $FlashMsg= Auth::applicant()->get()->username ;
                $applicant_personal_info->fathers_name = Input::get('fathers_name');
                $applicant_personal_info->mothers_name = Input::get('mothers_name');
                $applicant_personal_info->fathers_occupation = Input::get('fathers_occupation');
                $applicant_personal_info->fathers_phone = Input::get('fathers_phone');
                $applicant_personal_info->freedom_fighter = Input::get('freedom_fighter');
                $applicant_personal_info->mothers_occupation = Input::get('mothers_occupation');
                $applicant_personal_info->mothers_phone = Input::get('mothers_phone');
                $applicant_personal_info->national_id = Input::get('national_id');
                $applicant_personal_info->driving_licence = Input::get('driving_licence');
                $applicant_personal_info->passport = Input::get('passport');
                $applicant_personal_info->national_id = Input::get('national_id');
                $applicant_personal_info->marital_status = Input::get('marital_status');
                $applicant_personal_info->religion = Input::get('religion');

                $imagefile = Input::file('signature');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/applicant_images/app_meta/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $applicant_personal_info->signature = $file;

                $applicant_personal_info->present_address = Input::get('present_address');
                $applicant_personal_info->permanent_address = Input::get('permanent_address');
                $applicant_personal_info->save();
                DB::commit();
                return Redirect::back()->with('message', "Successfully Updated $FlashMsg Personal Information !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " $FlashMsg Personal Information  is not Updated.Invalid Request !");
            }
            return Redirect::back();
        }
        else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function edit_signature($id)
    {
        $signature = ApplicantMeta::find($id);
        return View::make('applicant::applicant_personal_info.edit_signature', compact('signature'));
    }

    public function update_signature($id)
    {
        $rules = array(
            'signature' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
            $signature = ApplicantMeta::find($id);
            $FlashMsg= Auth::applicant()->get()->username ;
            $imagefile = Input::file('signature');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/applicant_images/app_meta/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $signature->signature  = $file;
            $signature->save();
            DB::commit();
            return Redirect::back()->with('message', "Successfully updated $FlashMsg Signatures !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " $FlashMsg Signatures  is not Updated.Invalid Request !");
            }
            return Redirect::back();
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }


//***********************Applicant's Supporting Docs Start(R)*************************

    public function sDocsIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant= Auth::applicant()->get()->id;
            $supporting_docs = ApplicantSupportingDoc::where('applicant_id', '=', $applicant)->first();
            if(!$supporting_docs){
                $supporting_docs = new ApplicantSupportingDoc();
                $supporting_docs->applicant_id = Auth::applicant()->get()->id;
                $supporting_docs->save();
            }
            return View::make('applicant::applicant_supporting_docs.index', compact('supporting_docs', 'doc_type'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }


    }
    public function sDocsView($doc_type, $sdoc_id)
    {
        $supporting_docs = ApplicantSupportingDoc::where('id', '=', $sdoc_id)->first();
        if(!$supporting_docs)
            $supporting_docs = null;

        return View::make('applicant::applicant_supporting_docs.modals.supporting_docs', compact('supporting_docs', 'doc_type'));
    }

    public function sDocsStore()
    {
        $data = Input::all();
        $sdoc = $data['id'] ? ApplicantSupportingDoc::find($data['id']) : new ApplicantSupportingDoc;
        if ($data['doc_type']=='other') {
            $sdoc->other = Input::get('other');
        } else {
            $file = Input::file('doc_file');
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $sdoc_file=strtolower($filename);
            $path = public_path("/applicant_images/supporting_doc/" . $sdoc_file);
            Image::make($file->getRealPath())->resize(100, 100)->save($path);
            $sdoc->$data['doc_type'] =$sdoc_file;
        }
        if ($sdoc->save())
            return Redirect::to('applicant/supporting_docs/')->with('message', 'successfully added');
        else
            return Redirect::to('applicant/supporting_docs/')->with('message', 'Not Added');
    }


 //********************Applicant Extra-Curricular Activities Start(R)***************

    public function extraCurricularIndex()
    {
        if(Auth::applicant()->check()) {
            $datas = ApplicantExtraCurrActivity::orderBy('id', 'DESC')->paginate(5);
            $applicant = Auth::applicant()->get()->id;
            $data = ApplicantExtraCurrActivity::where('applicant_id', '=', $applicant)->first();
            return View::make('applicant::extra_curricular.index', compact('data','datas'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }

    public function extraCurricularCreate(){
        return View::make('applicant::extra_curricular._form');
    }

    public function applicantExtraCurricularStore(){

        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
            $extra_curricular =new ApplicantExtraCurrActivity();
            $extra_curricular->applicant_id = Auth::applicant()->get()->id;
            $FlashMsg= Auth::applicant()->get()->username ;
            $extra_curricular->title = Input::get('title');
            $extra_curricular->description = Input::get('description');
            $extra_curricular->achievement = Input::get('achievement');
            $imagefile = Input::file('certificate_medal');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/applicant_images/extra_curri_act/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $extra_curricular->certificate_medal  = $file;
            $extra_curricular->save();
            DB::commit();
            return Redirect::back()->with('message', "Successfully Added $FlashMsg Extra Curricular Information !");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$FlashMsg Extra Curricular Information Is not Added.Invalid Request !");
            }
            return Redirect::back();
        } else {
            return Redirect::to('applicant/extra_curricular/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function editExtraCurricular($id)
    {
        $extra_curricular = ApplicantExtraCurrActivity::find($id);
        return View::make('applicant::extra_curricular.edit', compact('extra_curricular'));
    }

    /**
     * @param $id
     * @return mixed ->
     */
    public function updateExtraCurricular($id)
    {
        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $extra_curricular = ApplicantExtraCurrActivity::find($id);
                $FlashMsg= Auth::applicant()->get()->username ;
                $extra_curricular->title = Input::get('title');
                $extra_curricular->description = Input::get('description');
                $extra_curricular->achievement = Input::get('achievement');
                $imagefile = Input::file('certificate_medal');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/applicant_images/extra_curri_act/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $extra_curricular->certificate_medal = $file;
                $extra_curricular->save();
                DB::commit();
                return Redirect::back()->with('message', "Successfully Updated $FlashMsg Extra Curricular Information !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$FlashMsg Extra Curricular Information is not Updated.Invalid Request !");
            }
            return Redirect::back();
        }
        else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    public function applicantExtraCurricularShow($id)
    {
        $datas = ApplicantExtraCurrActivity::find($id);
        return View::make('applicant::extra_curricular.show', compact('datas'));

    }

    public function applicantExtraCurricularDelete($id)
    {
        try {
            $data= ApplicantExtraCurrActivity::find($id);
            if($data->delete())
            {
                Session::flash('danger', "Activities Deleted successfully");
                //return Redirect::back();
                return Redirect::to('applicant/extra_curricular/');
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }


//***********************Applicant Miscellaneous Information Start(R)*************************

    public function miscInfoIndex()
    {
        if(Auth::applicant()->check()) {
            $applicant= Auth::applicant()->get()->id;
            $data = ApplicantMiscInfo::where('applicant_id', '=', $applicant)->first();
            return View::make('applicant::applicant_miscellaneous_info.index',compact('data','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }

    public function miscInfoCreate(){
        return View::make('applicant::applicant_miscellaneous_info.modal.miscellaneous');
    }

    public function miscInfoStore(){
        $rules = array(
            'ever_admit_this_university' => 'required',
            'ever_dismiss' => 'required',
            'academic_honors_received' => 'required',
            'ever_admit_other_university' => 'required',
            'admission_test_center' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
            $data =new ApplicantMiscInfo();
            $data->applicant_id = Auth::applicant()->get()->id;
            $FlashMsg= Auth::applicant()->get()->username ;
            $data->ever_admit_this_university = Input::get('ever_admit_this_university');
            $data->ever_dismiss = Input::get('ever_dismiss');
            $data->academic_honors_received = Input::get('academic_honors_received');
            $data->ever_admit_other_university = Input::get('ever_admit_other_university');
            $data->admission_test_center = Input::get('admission_test_center');
            $data->save();
            DB::commit();
            return Redirect::back()->with('message', "Successfully Added $FlashMsg Miscellaneous Information !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$FlashMsg Miscellaneous Information is not Added.Invalid Request !");
            }
            return Redirect::back();
        }
        else {
           return Redirect::to('applicant/misc_info/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function miscInfoEdit($id){
        $model= ApplicantMiscInfo::find($id);
        return View::make('applicant::applicant_miscellaneous_info.modal.edit', compact('model'));
    }

    public function miscInfoUpdate($id){
        $data= Input::all();
        $rules = array(
            'ever_admit_this_university' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()){
            DB::beginTransaction();
            try {
            $model = ApplicantMiscInfo::find($id);
            $FlashMsg= Auth::applicant()->get()->username ;
            $model->ever_admit_this_university = Input::get('ever_admit_this_university');
            $model->ever_dismiss = Input::get('ever_dismiss');
            $model->academic_honors_received = Input::get('academic_honors_received');
            $model->ever_admit_other_university = Input::get('ever_admit_other_university');
            $model->admission_test_center = Input::get('admission_test_center');
            $model->save();
            DB::commit();
            return Redirect::back()->with('message', "Successfully Updated $FlashMsg Miscellaneous Information !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$FlashMsg Miscellaneous Information is not Updated.Invalid Request !");
            }
            return Redirect::back();
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }


//{*********Admission :Starts Degree Apply By Applicant (Tanin)  ****************}

    public function degreeApply(){

        if(Auth::applicant()->check()){
            $batch_ids = Input::get('ids');
            if($batch_ids){
                foreach($batch_ids as $key => $value){
                    $data = new BatchApplicant();
                    $data->batch_id = $value;
                    $data->applicant_id = Auth::applicant()->get()->id;

                    $degreeApplicantCheck = DB::table('batch_applicant')
                        ->select(DB::raw('1'))
                        ->where('batch_id', '=', $data->batch_id)
                        ->where('applicant_id', '=', $data->applicant_id)
                        ->get();

                    if($degreeApplicantCheck){
                        Session::flash('info','The selected Degree(s)already added ! If You Want To Add More Please Select One That Is Not Added Yet Using "Add More Degree" Button.');
                    }else{
                        $data->save();
                    }
                }
            }else{
                Session::flash('info', "Please Select Degree From Degree List!");
                return Redirect::back();
            }
            return Redirect::route('admission.applicant_details', ['id' => Auth::applicant()->get()->id]);
        } else {
            Auth::logout();
            Session::flush(); //delete the session
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }

   // $id refers to applicant_id in DB table : BatchApplicant
    public function degreeOfferApplicantDetails($applicant_id){

        $apt_id = $applicant_id;
        $batch_applicant = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relDegree.relDegreeGroup','relBatch.relDegree.relDepartment')
            ->where('applicant_id', '=',$apt_id )
            ->get();

        $applicant_personal_info = ApplicantProfile::with('relCountry')
            ->where('applicant_id', '=',$apt_id )
            ->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',$apt_id )->get();

        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$apt_id )->first();

        return View::make('admission::adm_public.admission.applicant_details',
            compact('batch_applicant','applicant_personal_info','applicant_acm_records',
                'applicant_meta_records'));
    }

    public function addMoreDegree(){

        $degreeList = Batch::with('relDegree','relYear','relSemester','relDegree.relDegreeGroup','relDegree.relDepartment')->get();
        return View::make('admission::adm_public.admission.add_more_degree',compact('degreeList'));
    }

    // $id refers to batch_applicant_id
    public function admTestDetails($id){
        $batch_applicant_id = $id;
        //get batch_id
        $batch_id = BatchApplicant::where('id','=',$id)->first()->batch_id;

        $adm_test_details = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relDegree.relDegreeGroup',
            'relBatch.relDegree.relDepartment',
            'relBatch.relSemester','relBatch.relYear')
            ->where('batch_id', '=', $batch_id)
            ->first();
        //get adm_test_subject according to degree_id
        $adm_test_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject')
            ->where('batch_id','=',$batch_id)->get();
        //exam center choice list
        $exm_center_choice_lists = ExmCenterApplicantChoice::with('relExmCenter')->where('batch_applicant_id','=',$batch_applicant_id)->get();

        return View::make('admission::adm_public.admission.adm_test_details',
            compact('batch_applicant_id', 'adm_test_details','adm_test_subject','exm_center_choice_lists'));
    }

    public function admExmCenter($batch_applicant_id){

        $id = $batch_applicant_id;

        $batch_applicant_id = ['batch_applicant_id' => $batch_applicant_id];
        $rules = ['batch_applicant_id' => 'exists:exm_center_applicant_choice' ];
        $validator = Validator::make($batch_applicant_id, $rules);

        if ($validator->Fails()) {
            $exm_centers_all = ExmCenter::all();
        }else{
            $exm_center_choice = ExmCenterApplicantChoice::with('relExmCenter')->where('batch_applicant_id','=',$id)->get();
        }

        return View::make('admission::adm_public.admission.exm_center',
            compact('exm_centers_all','exm_center_choice','id'));
    }

    public function admExmCenterSave(){

        $id = Input::get('id');

        $batch_applicant_id = Input::get('batch_applicant_id');
        $exm_center_id = Input::get('exm_center_id');

        for($i=0; $i < count($exm_center_id); $i++) {
            $model = isset($id[$i]) ? ExmCenterApplicantChoice::findOrFail($id[$i]) : new ExmCenterApplicantChoice();
            $model->batch_applicant_id = $batch_applicant_id;
            $model->exm_center_id = $exm_center_id[$i];
            $model->save();
        }
        Session::flash('message',  ' Successfully performed This Request!');
        return Redirect::back();
    }

    public function admPaymentCheckoutByApplicant(){
        $applicant_id = Auth::applicant()->get()->id;
        $batch_applicant = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relDegree.relDegreeGroup','relBatch.relDegree.relDepartment')
            ->where('applicant_id', '=',$applicant_id )
            ->get();
        $applicant_personal_info = ApplicantProfile::with('relCountry')
            ->where('applicant_id', '=',$applicant_id )
            ->first();
        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',$applicant_id )->get();

        if(empty($applicant_personal_info) || empty($applicant_meta_records) ||  count($applicant_acm_records)< 2 ){
            return Redirect::back()->with('danger', 'Profile or Academic information is Missing! Complete Your profile to checkout!');
        }else{
            return View::make('admission::adm_public.admission.adm_checkouts',
                compact('batch_applicant'));
        }
    }
//{*********Admission :Ends Degree Apply By Applicant (Tanin)  ****************}
}

