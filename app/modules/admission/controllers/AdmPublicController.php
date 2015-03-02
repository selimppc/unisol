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
    public function admAptDetails(){

        $degree_ids = Input::get('ids');
        foreach($degree_ids as $key => $value){
            $data = new DegreeApplicant();
            $data->degree_id = $value;
            $data->applicant_id = 2;
            $data->save();
        }
        exit("OK");

    }
    public function admDegreeDetails($id){

        $degree_model = Degree::with('relYear', 'relSemester', 'relDegreeWaiver.relWaiver')
                        ->where('id', '=', $id)
                        ->first();
        return View::make('admission::adm_public.admission.degree_details',compact('degree_model'));

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