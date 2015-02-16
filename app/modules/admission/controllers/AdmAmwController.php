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
        $role_id = Role::where('title', '=','faculty' )->first()->id;
       // echo $role_id;exit;
        $user_faculty=User::where('role_id', '=', $role_id)->first()->role_id;
        //echo $user_faculty;exit;
        //retrieve data

        $faculty=User::lists('role_id','id');
        $courseType = CourseType::lists('title', 'id');
        $year = Year::lists('title', 'id');
        $course=Course::lists('title', 'id');
        $semester=Semester::lists('title', 'id');
        //$user=User::lists('username', 'id');

        return View::make('admission::amw.modals._form', compact('courseType','year','course','semester','user','faculty'));
    }

	public function store()
	{
        $rules = array(
//            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $course_model = new CourseManagement();

            $course_model->degree_program_id = Input::get('degree_program_id');
            $course_model->course_id = Input::get('course_id');
            $course_model->year_id = Input::get('year_id');
            $course_model->semester_id = Input::get('semester_id');
            $course_model->course_type_id = Input::get('course_type_id');
            $course_model->evolution_system = Input::get('evolution_system');
            $course_model->start_date = Input::get('start_date');
            $course_model->end_date = Input::get('end_date');
            $course_model->major_minor = Input::get('major_minor');
            $course_model->degree_id = Input::get('degree_id');
            $course_model->user_id = Input::get('user_id');

            $course_model->save();

            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

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
