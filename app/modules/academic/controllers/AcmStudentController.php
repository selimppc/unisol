<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

    public function acmCoursesIndex()
    {
        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;

        $course_list = BatchCourse::whereNotExists(function ($query) use ($batch_id){
            $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id')
                ->where('batch_course.batch_id', '=', $batch_id);
        })->orderBy('year_id')->orderBy('semester_id')->get();

        foreach($course_list as $key => $value){
            $left_courses[$value->relYear->title][$value->relsemester->title][$value->id]['title'] = $value->relCourse->title;
            $left_courses[$value->relYear->title][$value->relsemester->title][$value->id]['credit'] = $value->relCourse->credit;
        }
        return View::make('academic::student.courses.acm_courses',compact('courses','total_credit','left_courses','batch_courses'));
    }

	public function acmEnrollment(){

        $completed_data = CourseEnrollment::where('status', 'pass')->orderBy('id', 'DESC')->first();

        if($completed_data){
            $current_year_id = $completed_data->taken_in_year_id ? $completed_data->taken_in_year_id + 1 :'';
            $current_semester = $completed_data->taken_in_semester_id;
            $current_semester_id = $current_semester == 2 ? 3 : ($current_semester == 1 ? 2:($current_semester == 3? 1: '') ) ;

            $year_title = Year::findOrFail($current_year_id)->title;
            $semester_title = Semester::findOrFail($current_semester_id)->title;
            $batch_courses = BatchCourse::with('relBatch','relSemester','relYear')
                ->where('year_id', $current_year_id)->where('semester_id', $current_semester_id)->get();

        }

        if(empty($completed_data)){
            $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
            $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
            $batch_data = Batch::findOrFail($batch_id);
            $current_year_id = $batch_data->year_id;
            $year_title = Year::findOrFail($current_year_id)->title;
            $current_semester_id = $batch_data->semester_id;
            $semester_title = Semester::findOrFail($current_semester_id)->title;

            $batch_courses = BatchCourse::with('relBatch','relSemester','relYear')
                ->where('year_id', $current_year_id)->where('semester_id', $current_semester_id)->get();
        }
        return View::make('academic::student.courses.enrollment',compact('batch_courses', 'year_title', 'semester_title'));
    }

	public function acmCoursesEnrollment()
	{
        $checked_ids = Input::get('ids');

        if($checked_ids ){
            foreach($checked_ids as $key => $value){
                $data = new CourseEnrollment();

                $data->student_user_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
                //$data->taken_in_semester_id = $value;
                //$data->applicant_id = Auth::applicant()->get()->id;

                    $data->save();
            }exit;
        }else{
            Session::flash('info', "data do not added!");
            return Redirect::back();
        }
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
