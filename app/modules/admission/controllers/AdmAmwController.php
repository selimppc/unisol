<?php

class AdmAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }

	public function index()
	{
        return View::make('admission::amw.course_management.index');
	}

	public function create()
	{
        $courseType = CourseType::lists('title', 'id');
        $year = Year::lists('title', 'id');
        $course=Course::lists('title', 'id');
        $semester=Semester::lists('title', 'id');
        $user=User::lists('username', 'id');
        return View::make('admission::amw.modals._form', compact('courseType','year','course','semester','user'));

	}

	public function store()
	{


	}

	public function show($id)
	{

	}


	public function edit($id)
	{

	}


	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

    //TODO: course Management



}
