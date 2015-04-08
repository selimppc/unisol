<?php

class AdmPublicController extends \BaseController {

    /*function __construct() {
        $this->beforeFilter('admPublic', array('except' => array('')));
    }*/

	public function degreeOfferList()
	{
        $degreeList = Batch::with('relDegree','relYear','relSemester','relDegree.relDegreeGroup','relDegree.relDepartment')->paginate(10);
        return View::make('admission::adm_public.admission.degree_list',compact('degreeList'));
    }

    public function degreeOfferDetails($degree_id){
        //$id refers to degree_id in DB table:Batch
        $degree_model = Batch::with('relDegree','relYear','relSemester',
            'relDegree.relDepartment','relDegree.relDegreeGroup','relBatchWaiver.relWaiver')
            ->where('id', '=', $degree_id)
            ->get();

        $major_courses = BatchCourse::with('relBatch','relCourse')
            ->where('batch_id','=',$degree_id)
            ->where('major_minor','=','major')
            ->get();

        $minor_courses = BatchCourse::with('relBatch','relCourse')
            ->where('batch_id','=',$degree_id)
            ->where('major_minor','=','minor')
            ->get();

        $edu_gpa_model = BatchEducationConstraint::with('relBatch')
            ->where('batch_id','=',$degree_id)->get();

        $batch_adm_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject')
            ->where('batch_id','=',$degree_id)->get();

        $exm_centers = ExmCenter::get();

        return View::make('admission::adm_public.admission.degree_detail',
            compact('degree_model','major_courses', 'minor_courses',
                'edu_gpa_model','batch_adm_subject','exm_centers'));
    }


//{------------- Applicant Profile --------------------------------------------------}

    public function addApplicantProfileByApplicant(){
        $countryList = [''=>'Select One'] + Country::lists('title','id');
        return View::make('admission::adm_public.admission.modal_files.add_profile',compact('countryList'));
    }
    public function storeApplicantProfileByApplicant(){

        $data = Input::all();
        $applicant_personal_info = new ApplicantProfile();
        if ($applicant_personal_info->validate($data)) {
            $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
            $applicant_personal_info->date_of_birth = Input::get('date_of_birth');
            $applicant_personal_info->place_of_birth = Input::get('place_of_birth');
            $applicant_personal_info->gender = Input::get('gender');

            $imagefile= Input::file('profile_image');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $sdoc_file=strtolower($filename);
            $path = public_path("/applicant_images/profile/" . $sdoc_file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $applicant_personal_info->profile_image =$sdoc_file;

            $applicant_personal_info->city = Input::get('city');
            $applicant_personal_info->state = Input::get('state');
            $applicant_personal_info->country_id = Input::get('country_id');
            $applicant_personal_info->zip_code = Input::get('zip_code');
            $applicant_personal_info->phone = Input::get('phone');
            $applicant_personal_info->save();

            Session::flash('success', "Successfully Added Information!");
            return Redirect::back();
        } else {
            $errors = $applicant_personal_info->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }
    public function editApplicantProfileByApplicant($id){

        $applicant_personal_info= ApplicantProfile::find($id);
        $countryList = [''=>'Select One'] + Country::lists('title','id');
        return View::make('admission::adm_public.admission.modal_files.edit_profile', compact('applicant_personal_info','countryList'));
    }
    public function updateApplicantProfileByApplicant($id){

        $rules = array(
            'gender' => 'required',
            'zip_code' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $data = Input::all();
            $imagefile = $data['profile_image'];
            $applicant_personal_info = ApplicantProfile::find($id);
            if ($data) {
                $applicant_personal_info->applicant_id = Auth::applicant()->get()->id;
                $applicant_personal_info->date_of_birth = Input::get('date_of_birth');
                $applicant_personal_info->place_of_birth = Input::get('place_of_birth');
                $applicant_personal_info->gender = Input::get('gender');
                $applicant_personal_info->city = Input::get('city');
                $applicant_personal_info->state = Input::get('state');
                $applicant_personal_info->country_id = Input::get('country_id');
                $applicant_personal_info->zip_code = Input::get('zip_code');
                $applicant_personal_info->phone = Input::get('phone');

                if ($imagefile) {
                    $imagefile= Input::file('profile_image');
                    $extension = $imagefile->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $sdoc_file=strtolower($filename);
                    $path = public_path("/applicant_images/profile/" . $sdoc_file);
                    Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                    $applicant_personal_info->profile_image =$sdoc_file;
                }
                $applicant_personal_info->save();

                return Redirect::back()->with('message', 'Successfully Updated Information!');
            } else {
                return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        }
    }

// {------ Applicant Academic Records ------------------------------------------------------------}
    public function addApplicantAcmDocsPublic(){
        $countryList = [''=>'Select Country'] + Country::lists('title','id');
        return View::make('admission::adm_public.admission.modal_files.add_acm_docs',compact('applicant_id','countryList'));
    }

    public function storeApplicantAcmDocsPublic()
    {
        if(Auth::applicant()->check()) {
            $rules = array(
                'level_of_education' => 'required',
                'certificate' => 'required',
                'transcript' => 'required',
                'board_type' => 'required',
                'result_type' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                $model = new ApplicantAcademicRecords();
                $model->applicant_id = Auth::applicant()->get()->id;
                $model->level_of_education = Input::get('level_of_education');
                $model->degree_name = Input::get('degree_name');
                $model->institute_name = Input::get('institute_name');
                $model->academic_group = Input::get('academic_group');

                //save board or university according to board_type
                $model->board_type = Input::get('board_type');

                if ($model->board_type == 'board')
                    $model->board_university = Input::get('board_university_board');
                if ($model->board_type == 'university')
                    $model->board_university = Input::get('board_university_university');
                if ($model->board_type == 'other')
                    $model->board_university = Input::get('board_university_other');

                //$model->board_university = $board_university;
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

                $file_transcript = Input::file('transcript');
                $destinationPath = public_path() . '/files_public';
                $extension1 =  $file_transcript->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension1;
                $lower_name = strtolower($filename);
                Input::file('transcript')->move($destinationPath, $lower_name);
                $model->transcript = $filename;

                $file = Input::file('certificate');
                $destinationPath = public_path() . '/files_public';
                $extension =  $file->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $lower_name = strtolower($filename);
                Input::file('certificate')->move($destinationPath, $lower_name);
                $model->certificate = $filename;
                $model->save();

                Session::flash('success', "Successfully Added Information!");
                return Redirect::back();
            } else {
                return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        }else{
            return Redirect::route('user/login')->with('message', 'Please Login !');
        }
    }

    public function editApplicantAcmDocsPublic($id){
        $model= ApplicantAcademicRecords::find($id);
        return View::make('admission::adm_public.admission.modal_files.edit_acm_docs', compact('model'));
    }

    public function updateApplicantAcmDocsPublic($id){
        $rules = array(
//            'level_of_education' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $data = Input::all();
            $file = $data['certificate'];
            $file2 =$data['transcript'];
            $model = ApplicantAcademicRecords::find($id);

            if($data){
                $model->applicant_id = Auth::applicant()->get()->id;
                $model->level_of_education = Input::get('level_of_education');
                $model->degree_name = Input::get('degree_name');
                $model->institute_name = Input::get('institute_name');
                $model->academic_group = Input::get('academic_group');

                //save board or university according to board_type
                $model->board_type = Input::get('board_type');

                if ($model->board_type == 'board')
                    $model->board_university = Input::get('board_university_board');
                if ($model->board_type == 'university')
                    $model->board_university = Input::get('board_university_university');
                if ($model->board_type == 'other')
                    $model->board_university = Input::get('board_university_other');

                //$model->board_university = $board_university;
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

                if($file) {

                    $file = Input::file('certificate');
                    $destinationPath = public_path() . '/files_public';
                    $extension = $file->getClientOriginalName();
                    $filename = str_random(12) . '.' . $extension;
                    $lower_name = strtolower($filename);
                    Input::file('certificate')->move($destinationPath, $lower_name);
                    $model->certificate = $filename;
                }
                    if($file2){

                        $file2 = Input::file('transcript');
                        $path = public_path() . '/files_public';
                        $extension2 =  $file2->getClientOriginalName();
                        $filename2 = str_random(12) . '.' . $extension2;
                        $lower_name2 = strtolower($filename2);
                        Input::file('transcript')->move($path, $lower_name2);
                        $model->transcript = $filename2;
                    }
                }
            $model->save();

            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    public function deleteApplicantAcmDocsPublic($id){

        ApplicantAcademicRecords::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }

    public function degreeOfferApplicantCertificate($id){
        $applicant_id = $id;
        $model = ApplicantAcademicRecords::where('id', '=',$applicant_id )->first();
        return View::make('admission::adm_public.admission.applicant_certificate',compact('model'));

    }

    public function degreeOfferApplicantTranscript($id){
        $applicant_id = $id;
        $model = ApplicantAcademicRecords::where('id', '=',$applicant_id )->first();
        return View::make('admission::adm_public.admission.applicant_transcript',compact('model'));

    }
//  {--------------- Applicant Mete Data :In Public  ------------------------------------------------------------------------------------}
    public function addApplicantMetaInPublic(){

        return View::make('admission::adm_public.admission.modal_files.add_meta_info');
    }
    public function storeApplicantMetaInPublic(){
        $rules = array(
            'national_id' => 'required',
            'signature' => 'required',
            'freedom_fighter' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $applicant_meta_records = new ApplicantMeta();
            $applicant_meta_records->applicant_id = Auth::applicant()->get()->id;
            $applicant_meta_records->fathers_name = Input::get('fathers_name');
            $applicant_meta_records->mothers_name = Input::get('mothers_name');
            $applicant_meta_records->fathers_occupation = Input::get('fathers_occupation');
            $applicant_meta_records->fathers_phone = Input::get('fathers_phone');
            $applicant_meta_records->freedom_fighter = Input::get('freedom_fighter');
            $applicant_meta_records->mothers_occupation = Input::get('mothers_occupation');
            $applicant_meta_records->mothers_phone = Input::get('mothers_phone');
            $applicant_meta_records->national_id = Input::get('national_id');
            $applicant_meta_records->driving_licence = Input::get('driving_licence');
            $applicant_meta_records->passport = Input::get('passport');
            $applicant_meta_records->place_of_birth = Input::get('place_of_birth');
            $applicant_meta_records->national_id = Input::get('national_id');
            $applicant_meta_records->marital_status = Input::get('marital_status');
            $applicant_meta_records->nationality = Input::get('nationality');
            $applicant_meta_records->religion = Input::get('religion');

            if(Input::file('signature')){
                $file = Input::file('signature');
                $extension = $file->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $sdoc_file=strtolower($filename);              // rename file name to lower
                $path = public_path("/applicant_images/app_meta/" . $sdoc_file);
                Image::make($file->getRealPath())->resize(150, 150)->save($path);
                $applicant_meta_records->signature = $filename;
            }
            $applicant_meta_records->present_address = Input::get('present_address');
            $applicant_meta_records->permanent_address = Input::get('permanent_address');
            $applicant_meta_records->save();
            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
            return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    public function editApplicantMetaInPublic($id){
        $applicant_meta_records= ApplicantMeta::find($id);
        return View::make('admission::adm_public.admission.modal_files.edit_meta_info', compact('applicant_meta_records'));
    }

    public function updateApplicantMetaInPublic($id)
    {
        $rules = array(
            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $data = Input::all();
            $file = $data['signature'];
            $applicant_meta_records = ApplicantMeta::find($id);
            if ($data) {
                $applicant_meta_records->applicant_id = Auth::applicant()->get()->id;
                $applicant_meta_records->fathers_name = Input::get('fathers_name');
                $applicant_meta_records->mothers_name = Input::get('mothers_name');
                $applicant_meta_records->fathers_occupation = Input::get('fathers_occupation');
                $applicant_meta_records->fathers_phone = Input::get('fathers_phone');
                $applicant_meta_records->freedom_fighter = Input::get('freedom_fighter');
                $applicant_meta_records->mothers_occupation = Input::get('mothers_occupation');
                $applicant_meta_records->mothers_phone = Input::get('mothers_phone');
                $applicant_meta_records->national_id = Input::get('national_id');
                $applicant_meta_records->driving_licence = Input::get('driving_licence');
                $applicant_meta_records->passport = Input::get('passport');
                $applicant_meta_records->place_of_birth = Input::get('place_of_birth');
                $applicant_meta_records->marital_status = Input::get('marital_status');
                $applicant_meta_records->nationality = Input::get('nationality');
                $applicant_meta_records->religion = Input::get('religion');
                $applicant_meta_records->present_address = Input::get('present_address');
                $applicant_meta_records->permanent_address = Input::get('permanent_address');

                if ($file) {
                    $file = Input::file('signature');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $sdoc_file = strtolower($filename);              // rename file name to lower
                    $path = public_path("/applicant_images/app_meta/" . $sdoc_file);
                    Image::make($file->getRealPath())->resize(150, 150)->save($path);
                    $applicant_meta_records->signature = $filename;
                }

                $applicant_meta_records->save();

                return Redirect::back()->with('message', 'Successfully updated Information!');
            }
        }else {
            return Redirect::back()->with('error', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    /**
     * @param $id
     * @return mixed
     */
    public function store()
	{
		//
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
