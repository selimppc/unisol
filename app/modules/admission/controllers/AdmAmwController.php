<?php

class AdmAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }
// Admission : Course Management starts here...........................................................
	public function index()
	{
        $model = CourseManagement::orderby('id','DESC')->paginate(5);
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title','id');

        return View::make('admission::amw.course_management.index',compact('model','semester','year','degree','department'));
	}

	public function create()
	{
        $facultyList = User::FacultyList();

        $courseType =array('' => 'Please Select Course Type') + CourseType::lists('title', 'id');
        $year = array('' => 'Please Select Year') + Year::lists('title', 'id');
        $course= array('' => 'Please Select Course') + Course::lists('title', 'id');
        $semester= array('' => 'Please Select Semester') + Semester::lists('title', 'id');
        $degree= array('' => 'Please Select Degree') + Degree::lists('title', 'id');
        $degreeProgram= array('' => 'Please Select DegreeProgram') + DegreeProgram::lists('title', 'id');


        return View::make('admission::amw.course_management.modals._form', compact('courseType','year','course','semester','user','facultyList','degree','degreeProgram'));
    }

	public function store()
	{

        $rules = array(
//            'course_id' => 'required',
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
        return View::make('admission::amw.course_management.modals.show',compact('model'));
	}

    public function edit($id)
    {
        $course_model = CourseManagement::find($id);
        $facultyList = User::FacultyList();

        $courseType = CourseType::lists('title', 'id');
        $year = Year::lists('title', 'id');
        $course = Course::lists('title', 'id');
        $semester = Semester::lists('title', 'id');
        $degree = Degree::lists('title', 'id');
        $degreeProgram = DegreeProgram::lists('title', 'id');
        return View::make('admission::amw.course_management.modals.edit', compact('course_model', 'courseType', 'year', 'course', 'semester', 'user', 'facultyList', 'degree', 'degreeProgram'));
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

//Multiple dropdown filtering..........................................

    public function search(){

        $dep_id = Input::get('search_department');
        $semester_id = Input::get('search_semester');
        $degree_id =Input::get('search_degree');
        $year_id =Input::get('search_year');

        $model = CourseManagement::join('Degree', function($query) use($dep_id)
        {
            $query->on('degree.id', '=', 'course_management.degree_id');

            if(isset($dep_id) && !empty($dep_id)) $query->where('degree.department_id', '=', $dep_id);
        });
        $model = $model->select(['course_management.semester_id as sem_id', 'course_management.year_id as yr_id',
                    'course_management.id as cm_id',
                    'course_management.degree_id as deg_id', 'course_management.major_minor as major_minor',
                    'course_management.course_id as course_id', 'course_management.user_id as user_id',
                    'degree.department_id as dept_id', 'degree.title as deg_title' ]);
        if(isset($semester_id) && !empty($semester_id)) $model = $model->where('course_management.semester_id','=',$semester_id);
        if(isset($year_id) && !empty($year_id)) $model = $model->where('course_management.year_id','=',$year_id);
        if(isset($degree_id) && !empty($degree_id)) $model = $model->where('course_management.degree_id', '=', $degree_id);
        $model = $model->paginate();


        $semester = array('' => 'Select Semester ') +  Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') +  Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $course = array('' => 'Select Course ') + Course::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title','id');

        return View::make('admission::amw.course_management.search', compact('model','semester','department','course','degree','year'));

    }
// ......................................Admission : Course Management ends ................................

//.........................Admission :Degree Management starts here with method prefix-Dgm..................

   public function dgmIndex(){

       return View::make('admission::amw.degree_management.index');
   }
    public function dgmCreate(){

        $department = array('' => 'Select Department ') + Department::lists('title','id');
        $semester = array('' => 'Select Semester ') +  Semester::lists('title', 'id');
        $year = array('' => 'Please Select Year') + Year::lists('title', 'id');

        return View::make('admission::amw.degree_management.dgm_modals._form',compact('year','semester','department'));
    }

    public function dgmStore(){

        $rules = array(
//            'course_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $course_model = new CourseManagement();

            $course_model->title = Input::get('title');
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




}
