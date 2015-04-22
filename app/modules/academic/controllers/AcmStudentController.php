<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

	public function acmCoursesIndex()
	{
        /*$applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;*/
        //print_r($batch_id);exit;
        /*$left_courses = DB::table('batch_course')->whereNotExists(function ($query) use ($batch_id){
            $query->from('course_enrollment')
                  ->whereRaw('course_enrollment.batch_course_id = batch_course.id')
                  ->where('batch_course.batch_id', '=', $batch_id);
        })->get();*/

        /*$left_courses = BatchCourse::whereNotExists(function ($query) use ($batch_id){
                $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id')
                ->where('batch_course.batch_id', '=', $batch_id);
            })
            //->groupBy('year_id')
            ->get();*/

        $years = BatchCourse::with('relYear')->where('batch_id', 1)->groupBy('year_id')->get();
        foreach($years as $year){
            $yr [] = $year->year_id;
        }
        //dd(DB::getQueryLog($years));
        print_r($yr);
        foreach($yr as $key => $value){
            $semester = DB::select('SELECT * from batch_course WHERE year_id='.$value);
        }
        dd(DB::getQueryLog($semester));

        exit;

        $count = 0;
        foreach($semester as $sem){
            $course [] = BatchCourse::where('year_id', $sem[$count]['year_id'])->where('semester_id', $sem[$count]['semester_id'])->get();
        }

        print_r($course);exit;
        foreach ($years as $year) {
            /*$batch_course_data[] = [
                'semester' => BatchCourse::with('relSemester')->where('year_id', $year->year_id)
                    ->where('batch_id', $batch_id)->groupBy('semester_id')->get(),
                'year'=> $year,
                'course_semester' => BatchCourse::with('relSemester','courseByCourse')
                    ->where('year_id', $year->year_id)->where('batch_id', $batch_id)
                    //->groupBy('semester_id')
                    ->orderBy('semester_id')
                    ->get(),
            ];*/

            $left_courses [] = BatchCourse::whereNotExists(function ($query) use ($batch_id, $year){
                $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id')
                    ->where('batch_course.batch_id', '=', $batch_id)
                    ->where('batch_course.year_id', '=', $year->year_id);
            })
                //->groupBy('year_id')
                ->get();
        }
        print_r($left_courses);exit;

        /*$admission_test_home = BatchAdmtestSubject::with(['relBatch'=> function($query) use($year_id, $semester_id) {
            //$query->where('year_id', '=', $year_id)->where('semester_id', '=', $semester_id);
        }])->get();*/

        return View::make('academic::student.courses.acm_courses',compact('courses','total_credit','left_courses','batch_courses'));
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
        //print_r($batch_course);exit;
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
