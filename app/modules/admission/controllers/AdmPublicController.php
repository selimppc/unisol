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
    public function admDegreeSave(){

        $degree_ids = Input::get('ids');
        //print_r($degree_ids);exit;

            foreach($degree_ids as $key => $value){
                $data = new DegreeApplicant();
                $data->degree_id = $value;
                $data->applicant_id = 2;
                if($data->save()){
                    print_r($data->degree_id);exit;
                }
            }
        //exit("OK");
    }
    public function admDegreeDetails($id){
        $degree_model = Degree::with('relYear','relSemester',
            'relDegreeWaiver.relWaiver')
            ->where('id', '=', $id)
            ->first();
        $model = CourseManagement::with('relCourse')->where('degree_id','=',$id)->get();
        $edu_gpa_model = DegreeEducationConstraint::with('relDegree')->where('degree_id','=',$id)->get();

        return View::make('admission::adm_public.admission.degree_details',compact('degree_model','model','edu_gpa_model'));
    }
    public function admAptDetails($id){
        //echo 'hello';
       //$degree_ids = Input::get('ids');
        $data = DegreeApplicant::find($id);
        print_r($data);exit;






    }

    public function create()
	{
		//
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
