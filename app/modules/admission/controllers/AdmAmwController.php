<?php

class AdmAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }

	public function index()
	{
        $model = CourseManagement::all();
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title','id');

        return View::make('admission::amw.course_management.index',compact('model','semester','year','degree','department'));
	}

	public function create()
	{
        $role_id = Role::where('title', '=','faculty' )->first()->id;
        $facultyList = array('' => 'Please Select One') +  User::where('role_id', '=', $role_id)->lists('username', 'id');

        $courseType =array('' => 'Please Select Course Type') + CourseType::lists('title', 'id');
        $year = array('' => 'Please Select Year') + Year::lists('title', 'id');
        $course= array('' => 'Please Select Course') + Course::lists('title', 'id');
        $semester= array('' => 'Please Select Semester') + Semester::lists('title', 'id');
        $degree= array('' => 'Please Select Degree') + Degree::lists('title', 'id');
        $degreeProgram= array('' => 'Please Select DegreeProgram') + DegreeProgram::lists('title', 'id');


        return View::make('admission::amw.modals._form', compact('courseType','year','course','semester','user','facultyList','degree','degreeProgram'));
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

            if( $course_model->save()){
                return Redirect::to('course_manage/amw')->with('message', 'Successfully added Information!');
            }
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

	}

	public function show($id)
	{
        $model = CourseManagement::find($id);
        return View::make('admission::amw.modals.show',compact('model'));
	}


	public function edit($id)
    {
        $course_model = CourseManagement::find($id);
        $role_id = Role::where('title', '=', 'faculty')->first()->id;
        $facultyList = User::where('role_id', '=', $role_id)->lists('username', 'id');

        $courseType = CourseType::lists('title', 'id');
        $year = Year::lists('title', 'id');
        $course = Course::lists('title', 'id');
        $semester = Semester::lists('title', 'id');
        $degree = Degree::lists('title', 'id');
        $degreeProgram = DegreeProgram::lists('title', 'id');
        return View::make('admission::amw.modals.edit', compact('course_model', 'courseType', 'year', 'course', 'semester', 'user', 'facultyList', 'degree', 'degreeProgram'));
    }


	public function update($id)
	{
        $rules = array(
//            'ever_admit_this_university' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $course_model = CourseManagement::find($id);

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
          //  $course_model->user_id = Input::get('user_id');

            $course_model->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
	}

	public function destroy($id)
	{
		//
	}

    public function search(){

        $search_department_id =Input::get('search_department');
        $search_semester_id =Input::get('search_semester');
        $search_degree_id =Input::get('search_degree');
        $search_year_id =Input::get('search_year');
        /*echo "Department_id ".$search_department_id."<br>";
        echo "Degree_id ".$search_degree_id."<br><br>";
        echo "semester_id ".$search_semester_id."<br><br>";
        echo "year_id ".$search_year_id."<br><br>";*/

        $model = CourseManagement::with([
            'relDegree' => function($query) use($search_department_id){
                if(isset($search_department_id))
                    $query->where('department_id', $search_department_id);
            }]);

        $model->get();



        $semester = array('' => 'Select Semester ') +  Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') +  Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $course = array('' => 'Select Course ') + Course::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title','id');


        return View::make('admission::amw.course_management.index', compact('model','semester','department','course','degree','year'));
        //return View::make('admission::amw.course_management.test', compact('model'));

    }


    //TODO: course Management



}
