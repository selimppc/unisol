<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

	public function acmCoursesIndex()
	{
        return View::make('academic::student.courses.acm_courses');
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
