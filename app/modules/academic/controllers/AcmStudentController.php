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

	public function acmEnrollment(){

        $batch_courses = BatchCourse::with('relBatch','relSemester','relYear')->get();
        return View::make('academic::student.courses.enrollment',compact('batch_courses'));
    }

	public function acmCoursesEnrollment()
	{

        $checked_ids = Input::get('ids');
//        $year_id = Input::get('year_id');
//        $semester_id = Input::get('semester_id');
//        $student_user_id = Auth::user()->get()->id;

        print_r($checked_ids);exit;
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
