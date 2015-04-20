<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

	public function acmCoursesIndex()
	{
        $courses = CourseEnrollment::with('relBatchCourse.relCourse','relBatchCourse.relCourse.relYear')->get();
       // print_r($courses);exit;

        return View::make('academic::student.courses.acm_courses',compact('courses'));
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
