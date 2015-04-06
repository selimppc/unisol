<?php

class AdmPublicController extends \BaseController {

    /*function __construct() {
        $this->beforeFilter('admPublic', array('except' => array('')));
    }*/

	public function degreeOfferList()
	{
        $degreeList = Batch::with('relDegree')->paginate(10);
        return View::make('admission::adm_public.admission.degree_list',compact('degreeList'));

	}
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

            return Redirect::route('admission.public.applicant_details', ['id' => Auth::applicant()->get()->id]);
        } else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }
    }

    public function degreeOfferDetails($id){

        $degree_model = Batch::with('relDegree','relYear','relSemester',
            'relBatchWaiver.relWaiver')
            ->where('id', '=', $id)
            ->get();

        $major_courses = BatchCourse::with('relBatch','relCourse')
            ->where('batch_id','=',$id)
            ->where('major_minor','=','major')
            ->get();

        $minor_courses = BatchCourse::with('relBatch','relCourse')
            ->where('batch_id','=',$id)
            ->where('major_minor','=','minor')
            ->get();

        $edu_gpa_model = BatchEducationConstraint::with('relBatch')
            ->where('batch_id','=',$id)->get();

        $batch_adm_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject')
            ->where('batch_id','=',$id)->get();

        $exm_centers = ExmCenter::get();
        //print_r($exm_centers);exit;
        return View::make('admission::adm_public.admission.degree_detail',
                  compact('degree_model','major_courses', 'minor_courses',
                         'edu_gpa_model','batch_adm_subject','exm_centers'));
    }


    public function degreeOfferApplicantDetails($id){

        $applicant_id = $id;
        $batch_applicant = BatchApplicant::with('relBatch','relBatch.relDegree')
                           ->where('applicant_id', '=',$applicant_id )
                           ->get();
        //print_r($batch_applicant);exit;
        $applicant_personal_info = ApplicantProfile::with('relCountry')
                          ->where('applicant_id', '=',$applicant_id )
                          ->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',$applicant_id )->get();

        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();

        return View::make('admission::adm_public.admission.applicant_details',
                  compact('batch_applicant','applicant_personal_info','applicant_acm_records',
                      'applicant_meta_records'));
    }
    public function addMoreDegree(){

        $degreeList = Batch::with('relDegree')->get();
        return View::make('admission::adm_public.admission.add_more_degree',compact('degreeList'));
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
            $applicant_personal_info->applicant_id = Input::get('applicant_id');
            $applicant_personal_info->date_of_birth = Input::get('date_of_birth');
            $applicant_personal_info->place_of_birth = Input::get('place_of_birth');
            $applicant_personal_info->gender = Input::get('gender');

            $imagefile= Input::file('profile_image');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $sdoc_file=strtolower($filename);
            $path = public_path("files_public/" . $sdoc_file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $applicant_personal_info->profile_image =$sdoc_file;

            $applicant_personal_info->city = Input::get('city');
            $applicant_personal_info->state = Input::get('state');
            $applicant_personal_info->country_id = Input::get('country_id');
            $applicant_personal_info->zip_code = Input::get('zip_code');
            $applicant_personal_info->phone = Input::get('phone');
            $applicant_personal_info->save();
            return Redirect::back();
        } else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::back();
        }
    }
    public function editApplicantProfileByApplicant($id){

        $applicant_personal_info= ApplicantProfile::find($id);
        //print_r($applicant_personal_info);exit;
        $countryList = [''=>'Select One'] + Country::lists('title','id');
        return View::make('admission::adm_public.admission.modal_files.edit_profile', compact('applicant_personal_info','countryList'));
    }
    public function updateApplicantProfileByApplicant($id){

        //$data = Input::all();
        //echo 'ok';exit;
        $applicant_personal_info = ApplicantProfile::find($id);
//        if ($model->validate($data)) {
        $applicant_personal_info->applicant_id = Input::get('applicant_id');
        $applicant_personal_info->date_of_birth = Input::get('date_of_birth');
        $applicant_personal_info->place_of_birth = Input::get('place_of_birth');
        $applicant_personal_info->gender = Input::get('gender');

        $file = Input::file('profile_image');

        $extension = $file->getClientOriginalExtension();
        $filename = str_random(12) . '.' . $extension;
        $path = public_path("files_public/" . $filename);
        Image::make($file->getRealPath())->resize(100, 100)->save($path);

        $applicant_personal_info->profile_image = $filename;

        $applicant_personal_info->city = Input::get('city');
        $applicant_personal_info->state = Input::get('state');
        $applicant_personal_info->country_id = Input::get('country_id');
        $applicant_personal_info->zip_code = Input::get('zip_code');
        $applicant_personal_info->phone = Input::get('phone');
        $applicant_personal_info->save();
        Session::flash('message', "Successfully Performed This Action!");
        return Redirect::back();
    }

// {------ Applicant Academic Records ------------------------------------------------------------}
    public function addApplicantAcmDocsPublic(){
        $countryList = [''=>'Select Country'] + Country::lists('title','id');
        return View::make('admission::adm_public.admission.add_acm_docs',compact('applicant_id','countryList'));
    }

    public function storeApplicantAcmDocsPublic()
    {
        if(Auth::applicant()->check()) {
            $rules = array(
          //  'certificate' => 'required',
//            'degree_name' => 'required',
//            'institute_name' => 'required',
//            'academic_group' => 'required',
//            'board_university' => 'required',
//            'major_subject' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes()) {
                //$data = Input::all();
                //$model = $data['id'] ? ApplicantAcademicRecords::find($data['id']) : new ApplicantAcademicRecords;
                $model = new ApplicantAcademicRecords();
                $model->applicant_id = Input::get('applicant_id');
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

                return Redirect::route('admission.public.applicant_details', ['id' => Auth::applicant()->get()->id]);
            } else {
                return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        }else{
            return Redirect::route('user/login')->with('message', 'Please Login !');
        }
    }
    public function editApplicantAcmDocsPublic($id){
        $model= ApplicantAcademicRecords::find($id);
        return View::make('admission::adm_public.admission.edit_acm_docs', compact('model'));
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
                $model->applicant_id = Input::get('applicant_id');
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
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
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
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $applicant_meta_records = new ApplicantMeta();
            $applicant_meta_records->applicant_id = Input::get('applicant_id');
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
                $path = public_path("files_public/" . $sdoc_file);
                Image::make($file->getRealPath())->resize(150, 150)->save($path);
                $applicant_meta_records->signature = $filename;
            }
            $applicant_meta_records->present_address = Input::get('present_address');
            $applicant_meta_records->permanent_address = Input::get('permanent_address');
            $applicant_meta_records->save();
            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    public function editApplicantMetaInPublic($id){
        $applicant_meta_records= ApplicantMeta::find($id);
        return View::make('admission::adm_public.admission.modal_files.edit_meta_info', compact('applicant_meta_records'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateApplicantMetaInPublic($id)
    {
        $rules = array(
            'national_id' => 'required',
            'signature' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $data = Input::all();
            $file = $data['signature'];
            $applicant_meta_records = ApplicantMeta::find($id);
            if ($data) {
                $applicant_meta_records->applicant_id = Input::get('applicant_id');
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
                    $path = public_path("files_public/" . $sdoc_file);
                    Image::make($file->getRealPath())->resize(150, 150)->save($path);
                    $applicant_meta_records->signature = $filename;
                }

                $applicant_meta_records->save();

                return Redirect::back()->with('message', 'Successfully added Information!');
            } else {
                return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
            }
        }
    }

    public function admTestDetails($id){
        $batch_applicant_id = $id;
        //get batch_id
        $batch_id = BatchApplicant::where('id','=',$id)->first()->batch_id;

        $adm_test_details = BatchApplicant::with('relBatch','relBatch.relSemester','relBatch.relYear')
                          ->where('batch_id', '=', $batch_id)
                          ->first();
        //get adm_test_subject according to degree_id
        $adm_test_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject')
            ->where('batch_id','=',$batch_id)->get();
        //$exam_center_id = ExmCenterApplicantChoice::where('exm_center_id','=',)
        $exm_center_choice_lists = ExmCenterApplicantChoice::with('relExmCenter')->where('batch_applicant_id','=',$batch_applicant_id)->get();

        return View::make('admission::adm_public.admission.adm_test_details',
                  compact('batch_applicant_id', 'adm_test_details','adm_test_subject','exm_center_choice_lists'));
    }

    public function admExmCenter($batch_applicant_id){

        $ba_id = $batch_applicant_id;

        $batch_applicant_id = ['batch_applicant_id' => $batch_applicant_id];
        $rules = ['batch_applicant_id' => 'exists:exm_center_applicant_choice' ];
        $validator = Validator::make($batch_applicant_id, $rules);
        $exm_center_lists = ['' => 'Select Exam Center'] + ExmCenter::lists('title', 'id');
        if ($validator->Fails()) {
            $exm_centers_all = ExmCenter::all();
        }else{
            $exm_center_choice = ExmCenterApplicantChoice::with('relExmCenter')->where('batch_applicant_id','=',$ba_id)->get();
        }

        return View::make('admission::adm_public.admission.exm_center',
            compact('exm_centers_all','exm_center_choice','ba_id', 'exm_center_lists'));
    }
    public function admExmCenterSave(){

        $id = Input::get('id');
        //print_r($id);
        $batch_applicant_id = Input::get('batch_applicant_id');
        $exm_center_id = Input::get('exm_center_id');
        //print_r($exm_center_id);exit;

        for($i=0; $i < count($exm_center_id); $i++) {
            $model = $id[$i] ? ExmCenterApplicantChoice::findOrFail($id[$i]) : new ExmCenterApplicantChoice();
            $model->batch_applicant_id = $batch_applicant_id;
            $model->exm_center_id = $exm_center_id[$i];
            $model->save();
        }
        Session::flash('message',  ' Successfully performed This Request!');
        return Redirect::back();
    }

    public function admDegAptCheckout(){
        $applicant_id = Auth::applicant()->get()->id;
        $batch_applicant = BatchApplicant::with('relBatch')
            ->where('applicant_id', '=',$applicant_id )
            ->get();
        $applicant_personal_info = ApplicantProfile::with('relCountry')
            ->where('applicant_id', '=',$applicant_id )
            ->first();
        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',1 )->get();

        if(empty($applicant_personal_info) || empty($applicant_meta_records) ||  count($applicant_acm_records)< 2 ){
            return Redirect::back()->with('danger', 'Profile or Academic information is Missing! Complete Your profile to checkout!');
        }else{
            return View::make('admission::adm_public.admission.adm_checkouts',
                      compact('batch_applicant'));
        }
    }

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
