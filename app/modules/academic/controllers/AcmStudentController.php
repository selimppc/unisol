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

        }elseif(empty($completed_data)){

            $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
            $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;

            $batch_data = Batch::findOrFail($batch_id);

            $current_year_id = $batch_data->year_id;
            $year_title = Year::findOrFail($current_year_id)->title;
            $current_semester_id = $batch_data->semester_id;
            $semester_title = Semester::findOrFail($current_semester_id)->title;

            $batch_courses = BatchCourse::where('year_id', $current_year_id)->where('semester_id', $current_semester_id)->get();
        }

        return View::make('academic::student.courses.enrollment',compact(
            'batch_courses', 'year_title', 'semester_title', 'current_year_id', 'current_semester_id'
        ));
    }

	public function acmCoursesEnrollment()
	{
        $checked_ids = Input::get('ids');
        $taken_in_year = Input::get('taken_in_year');
        $taken_in_semester = Input::get('taken_in_semester');
        $student_user_id = Auth::user()->get()->id;

        if($checked_ids ){
            foreach($checked_ids as $key => $value){
                $model = new CourseEnrollment();
                $model->batch_course_id = $value;
                $model->student_user_id = $student_user_id;
                $model->taken_in_year_id = $taken_in_year;
                $model->taken_in_semester_id = $taken_in_semester;
                $model->status =$value;
                $model->save();
            }
            Session::flash('message', "Successfully added Courses For Enrollment!");
            return Redirect::back();
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
