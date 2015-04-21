<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

	public function acmCoursesIndex()
	{
        $courses = CourseEnrollment::with('relBatchCourse.relCourse','relBatchCourse.relBatch.relYear')->get();
        //print_r($courses);exit;
        $total_credit = CourseEnrollment::with('relBatchCourse.relBatch.relDegree')->first();
        return View::make('academic::student.courses.acm_courses',compact('courses','total_credit'));
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
