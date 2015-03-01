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

        $data = new DegreeApplicant();

        $data->degree_id = Input::get('ids[]');

       if($data->save()) {
           echo 'ok';
       }
        else{
            return 0;
        }



//        $degree_list = new DegreeApplicant();

        //print_r($check_id) ;exit;
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
