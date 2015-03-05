<?php

class AdmPublicController extends \BaseController {

    /*function __construct() {
        $this->beforeFilter('admPublic', array('except' => array('')));
    }*/

	public function admIndex()
	{
        $degreeList = Degree::orderby('id', 'DESC')->paginate(5);
        return View::make('admission::adm_public.admission.index',compact('degreeList'));

	}
    public function admDegreeAptSave(){

            if(Auth::applicant()->check()){
                $degree_ids = Input::get('ids');
                foreach($degree_ids as $key => $value){
                    $data = new DegreeApplicant();
                    $data->degree_id = $value;
                    $data->applicant_id = Auth::applicant()->get()->id;
                    $data->save();
                }
            }else{
                echo " you lost !";
            }
        return Redirect::route('admission.apt_details', ['id' => Auth::applicant()->get()->id]);
    }


    public function admDegreeApplicantDetails($id){

        $degree_model = Degree::with('relYear','relSemester',
            'relDegreeWaiver.relWaiver')
            ->where('id', '=', $id)
            ->first();
        $model = CourseManagement::with('relCourse')->where('degree_id','=',$id)->get();
        $edu_gpa_model = DegreeEducationConstraint::with('relDegree')->where('degree_id','=',$id)->get();

        return View::make('admission::adm_public.admission.degree_details',compact('degree_model','model','edu_gpa_model'));
    }

    public function admAptDetails($id){

        $applicant_id = $id;
        $degree_applicant = DegreeApplicant::with('relDegree')
                           ->where('applicant_id', '=',$applicant_id )->get();

        /*$applicant_profile = ApplicantProfile::find($applicant_id);*/
        return View::make('admission::adm_public.admission.apt_details',compact('degree_applicant'));
    }

    public function admTestDetails($id){


        $degree_id = DegreeApplicant::where('id','=',$id)->get();
       // print_r($degree_id);exit;

        /*$adm_test_model = DegreeApplicant::with('relDegree','relDegree.relSemester','relDegree.relYear')
                          ->where('id', '=', $id)
                         ->first();*/

        $adm_test_subject = DegreeAdmTestSubject::where('id','=',$id)->get();
        print_r($adm_test_subject);exit;

        return View::make('admission::adm_public.admission.adm_test_details',compact('adm_test_model'));
    }

    public function create()
	{

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
