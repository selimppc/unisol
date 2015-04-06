<?php
class ApplicantController extends \BaseController
{


//**************************Applicant Sign Up Start(R)***********************

    public  function applicant_signup()
    {
        return View::make('applicant::signup.signup');
    }

    public function applicant_signup_data_save()
    {
        // TODO : Need to add captcha.Need to save reg_date,last_visit,ip_address
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
            return Redirect::to('/applicant')->withErrors($validator)->withInput();
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
                    return Redirect::to('/applicant');
                } else {
                    Session::flash('danger', 'Please try again');
                    return Redirect::to('/applicant');

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
        if(Auth::applicant()->check())
        {
            $model= Applicant::findOrFail(Auth::applicant()->get()->id);
            $old_password = Input::get('password');
            $user_password = Auth::applicant()->get()->password;

            if(Hash::check($old_password, $user_password)){
                $rules = array(
                    'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
                    'confirm_password' => 'Required|same:password',
                );
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->Fails()) {
                    Session::flash('message', 'Invalid!!');
                    return Redirect::back()->withErrors($validator)->withInput();
                } else{
                    $model->password = Hash::make(Input::get('password'));
                    if($model->save()){
                        return Redirect::back()->with('message', 'Successfully Updated Password.You can sign In now!');
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
                $account = Applicant::find($id);
                $account->id = Auth::applicant()->get()->id;
                $account->first_name = Input::get('first_name');
                $account->middle_name = Input::get('middle_name');
                $account->last_name = Input::get('last_name');
                $account->username = Input::get('username');
                $account->email = Input::get('email');
                $account->save();

                return Redirect::back()->with('message', 'Successfully Updated Information!');
            } else {
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
                $applicant_model->applicant_id = Auth::applicant()->get()->id;
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
                return Redirect::back()->with('message', 'Successfully Added!');
            } else {
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
                $applicant_model = ApplicantProfile::find($id);
                $applicant_model->applicant_id = Auth::applicant()->get()->id;
                $applicant_model->date_of_birth = Input::get('date_of_birth');
                $applicant_model->place_of_birth = Input::get('place_of_birth');
                $applicant_model->gender = Input::get('gender');

                $file = Input::file('profile_image');
                if ($file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $path = public_path("/applicant_images/profile/" . $filename);
                    Image::make($file->getRealPath())->resize(100, 100)->save($path);

                    $applicant_model->profile_image = $filename;
                }
                $applicant_model->city = Input::get('city');
                $applicant_model->state = Input::get('state');
                $applicant_model->country_id = Input::get('country_id');
                $applicant_model->zip_code = Input::get('zip_code');
                $applicant_model->phone = Input::get('phone');
                $applicant_model->save();

                return Redirect::back()->with('message', 'Successfully Updated Information!');
            } else {
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

            $profile = ApplicantProfile::find($id);
            $imagefile = Input::file('profile_image');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/applicant_images/profile/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $profile->profile_image = $file;
            $profile->profile_image = $filename;
            $profile->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
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

    //TODO:create _form js need to check to store
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
            $applicant_personal_info =new ApplicantMeta();
            $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
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
            return Redirect::back()->with('message', 'Successfully updated Information!');
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
            $applicant_personal_info = ApplicantMeta::find($id);
            $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
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
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
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

            $signature = ApplicantMeta::find($id);
            $imagefile = Input::file('signature');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/applicant_images/app_meta/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $signature->signature  = $file;
            $signature->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
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
            return Redirect::to('apt/supporting_docs/')->with('message', 'successfully added');
        else
            return Redirect::to('apt/supporting_docs/')->with('message', 'Not Added');
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
            $extra_curricular =new ApplicantExtraCurrActivity();
            $extra_curricular->applicant_id = Auth::applicant()->get()->id;
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
            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
            return Redirect::to('apt/extra_curricular/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
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
            $extra_curricular = ApplicantExtraCurrActivity::find($id);
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
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
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
                return Redirect::to('apt/extra_curricular/');
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }


//***********************Applicant Miscellaneous Information(R)*************************

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
            $data =new ApplicantMiscInfo();
            $data->applicant_id = Auth::applicant()->get()->id;
            $data->ever_admit_this_university = Input::get('ever_admit_this_university');
            $data->ever_dismiss = Input::get('ever_dismiss');
            $data->academic_honors_received = Input::get('academic_honors_received');
            $data->ever_admit_other_university = Input::get('ever_admit_other_university');
            $data->admission_test_center = Input::get('admission_test_center');
            $data->save();

            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
           return Redirect::to('apt/misc_info/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
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
        if ($validator->passes())
        {
            $model = ApplicantMiscInfo::find($id);
            $model->ever_admit_this_university = Input::get('ever_admit_this_university');
            $model->ever_dismiss = Input::get('ever_dismiss');
            $model->academic_honors_received = Input::get('academic_honors_received');
            $model->ever_admit_other_university = Input::get('ever_admit_other_university');
            $model->admission_test_center = Input::get('admission_test_center');
            $model->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

}

