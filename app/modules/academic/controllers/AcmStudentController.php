<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

	public function acmCoursesIndex()
	{

        $batch_courses1 = BatchCourse::with('relSemester')->where('semester_id','=','1')->get();
        $batch_courses2 = BatchCourse::with('relSemester')->where('semester_id','=','3')->get();
        //print_r($batch_courses2);

        $courses = CourseEnrollment::with('relBatchCourse.relCourse','relBatchCourse.relBatch.relYear')->get();
        //print_r($courses);exit;
        $total_credit = CourseEnrollment::with('relBatchCourse.relBatch.relDegree')->first();
        return View::make('academic::student.courses.acm_courses',compact('courses','total_credit','batch_courses1','batch_courses2'));
	}

	public function acmEnrollment(){

        $completed_data = CourseEnrollment::where('status', 'pass')->orderBy('id', 'DESC')->first();

        if($completed_data){
            $current_year_id = $completed_data->taken_in_year_id ? $completed_data->taken_in_year_id + 1 :'';
            $current_semester = $completed_data->taken_in_semester_id;
            $current_semester_id = $current_semester == 2 ? 3 : ($current_semester == 1 ? 2:($current_semester == 3? 1: '') ) ;

        }
        if(empty($completed_data)){
            $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
            $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
            $batch_data = Batch::findOrFail($batch_id);
            $current_year_id = $batch_data->year_id; $year_title = Year::findOrFail($current_year_id)->title;
            $current_semester_id = $batch_data->semester_id; $semester_title = Semester::findOrFail($current_semester_id)->title;


            $batch_courses = BatchCourse::with('relBatch','relSemester','relYear')
                ->where('year_id', $current_year_id)->where('semester_id', $current_semester_id)->get();
        }


        return View::make('academic::student.courses.enrollment',compact('batch_courses', 'year_title', 'semester_title'));
    }

	public function acmCoursesEnrollment()
	{

        $checked_ids = Input::get('ids');
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');
        $student_user_id = Auth::user()->get()->id;

        //print_r($year_id);exit;
        $unchecked_ids = BatchCourse::where('is_mandatory','=','1')->get();

        $batch_course = BatchCourse::where('id','=',$checked_ids)->get();
        print_r($batch_course);exit;
        if($checked_ids ){
            foreach($checked_ids as $key => $value){
                $data = new CourseEnrollment();

                $data->save();exit;



            }
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
