<?php

class AdmPublicController extends \BaseController {

    /*function __construct() {
        $this->beforeFilter('admPublic', array('except' => array('')));
    }*/

	public function admDegreeList()
	{
        $degreeList = Degree::orderby('id', 'DESC')->paginate(5);
        return View::make('admission::adm_public.admission.degree_list',compact('degreeList'));

	}
    public function admDegreeApplicantSave(){

            if(Auth::applicant()->check()){
                $degree_ids = Input::get('ids');
                foreach($degree_ids as $key => $value){

                    $data = new DegreeApplicant();
                    $data->degree_id = $value;
                    $data->applicant_id = Auth::applicant()->get()->id;

                    $data->save();
              }
                    return Redirect::route('admission.apt_profile_details', ['id' => Auth::applicant()->get()->id]);
            } else {
                Session::flash('danger', "Please Login!");
                return Redirect::back();
            }
    }

    public function admDegreeApplicantDetails($degree_id){

        $degree_model = Degree::with('relYear','relSemester',
            'relDegreeWaiver.relWaiver')
            ->where('id', '=', $degree_id)
            ->get();

        $major_courses = CourseManagement::with('relCourse')
            ->where('degree_id','=',$degree_id)
            ->where('major_minor','=','major')
            ->get();

        $minor_courses = CourseManagement::with('relCourse')
            ->where('degree_id','=',$degree_id)
            ->where('major_minor','=','minor')
            ->get();

        $edu_gpa_model = DegreeEducationConstraint::with('relDegree')
            ->where('degree_id','=',$degree_id)->get();

        return View::make('admission::adm_public.admission.degree_detail',
                  compact('degree_model','major_courses', 'minor_courses', 'edu_gpa_model'));
    }

    public function admDegAptProfileDetails($id){

        $applicant_id = $id;
        $degree_applicant = DegreeApplicant::with('relDegree')
                           ->where('applicant_id', '=',$applicant_id )
                           ->get();
        //print_r($degree_applicant);exit;
        $applicant_personal_info = ApplicantProfile::with('relCountry')
                          ->where('applicant_id', '=',$applicant_id )
                          ->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',$applicant_id )->get();

        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();

        return View::make('admission::adm_public.admission.apt_profile_details',
                  compact('degree_applicant','applicant_personal_info','applicant_acm_records','applicant_meta_records'));
    }

    public function admTestDetails($id){
        //get degree_id
        $degree_id = DegreeApplicant::where('id','=',$id)->first()->degree_id;

        $adm_test_model = DegreeApplicant::with('relDegree','relDegree.relSemester','relDegree.relYear')
                          ->where('id', '=', $id)
                          ->first();
        //get adm_test_subject according to degree_id
        $adm_test_subject = DegreeAdmTestSubject::with('relAdmTestSubject')
                            ->where('degree_id','=',$degree_id)->get();

        return View::make('admission::adm_public.admission.adm_test_details',
                  compact('adm_test_model','adm_test_subject'));
    }

    public function admDegAptCheckout(){

        $applicant_id = Auth::applicant()->get()->id;

        $degree_applicant = DegreeApplicant::with('relDegree')
            ->where('applicant_id', '=',$applicant_id )
            ->get();

        $applicant_personal_info = ApplicantProfile::with('relCountry')
            ->where('applicant_id', '=',$applicant_id )
            ->first();

        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();
        $applicant_acm_records = ApplicantAcademicRecords::where('applicant_id', '=',$applicant_id )->get();

        if($applicant_personal_info == Null) {
            Session::flash('error', "Your Personal information is missing !
                          Please Add Your Personal Info Correctly .");
        }
        if($applicant_meta_records == Null) {
            Session::flash('danger', "Your Biographical information is missing !
                      Please Add Your Biographical Info Correctly .");
        }
        if(!is_array($applicant_acm_records)) {
                Session::flash('info', "Your Academic information is missing .
                          Please Add Your Academic Records Correctly .");
        }
        return View::make('admission::adm_public.admission.adm_checkouts',
                compact('degree_applicant'));
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
