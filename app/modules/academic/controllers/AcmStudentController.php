<?php

class AcmStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicStudent', array('except' => array('acmCoursesIndex')));
    }

    public function acmCoursesIndex()
    {

        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
        #print_r($applicant_id);
        #print_r($batch_id);exit;

        $course_list = BatchCourse::whereNotExists(function ($query) use ($batch_id){
            $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id');
               // ->where('batch_course.batch_id', '=', $batch_id);
        })->where('batch_id', '=', $batch_id)->orderBy('year_id')->orderBy('semester_id')->get();

        foreach($course_list as $key => $value){
            $left_courses[$value->relYear->title][$value->relsemester->title][$value->id]['title'] = $value->relCourse->title;
            $left_courses[$value->relYear->title][$value->relsemester->title][$value->id]['credit'] = $value->relCourse->credit;
        }
        $total_credit = BatchCourse::with('relBatch','relBatch.relDegree')->where('batch_id','=',$batch_id)->first();

       /*Completed Courses*/
        $completed_course = CourseEnrollment::with('relBatchCourse','relBatchCourse.relCourse')
                            ->whereIn('status',array('pass','fail'))->get();
        $completed_course_in_year = CourseEnrollment::with('relBatchCourse','relBatchCourse.relYear','relBatchCourse.relSemester')
                           ->whereIn('status',array('pass','fail'))->first();

        /*Running Courses*/
        $running_course = CourseEnrollment::with('relBatchCourse','relBatchCourse.relCourse')
                           ->whereIn('status', array('enrolled', 'revoked','invoked'))->get();
        $running_course_in_year = CourseEnrollment::with('relBatchCourse','relBatchCourse.relYear','relBatchCourse.relSemester')
                          ->where('status','enrolled')->first();


        /*Accomplished Credit*/
        $accomplished_credit = DB::table('course_enrollment')
                        ->select(DB::raw('SUM(course.credit) as accomplished_credit'))
                        ->leftJoin('batch_course', 'course_enrollment.batch_course_id', '=', 'batch_course.id')
                        ->leftJoin('course', 'batch_course.course_id', '=', 'course.id')
                        ->where('course_enrollment.status', '=', 'pass')
                        ->first();

        return View::make('academic::student.courses.acm_courses',compact('courses','total_credit','left_courses','batch_courses',
            'completed_course','completed_course_in_year','running_course','accomplished_credit','running_course_in_year'));
    }

	public function acmEnrollment(){

        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
        $completed_data = CourseEnrollment::where('status', 'fail')->orWhere('status', 'pass')->first();

        if($completed_data){
            $current_year_id = $completed_data->taken_in_year_id ? $completed_data->taken_in_year_id + 1 :'';
            $current_semester = $completed_data->taken_in_semester_id;
            $current_semester_id = $current_semester == 2 ? 3 : ($current_semester == 1 ? 2:($current_semester == 3? 1: '') ) ;

            $year_title = Year::findOrFail($current_year_id)->title;
            $semester_title = Semester::findOrFail($current_semester_id)->title;
            //$batch_courses = BatchCourse::with('relBatch','relSemester','relYear')
            $batch_courses = BatchCourse::whereNotExists(function ($query) use ($batch_id){
                $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id')
//                    ->where('batch_course.batch_id', '=', $batch_id)
                    ->where('course_enrollment.student_user_id', '=', Auth::user()->get()->id);
            })//->where('semester_id', $current_semester_id)//where('year_id', $current_year_id)
            //->where('semester_id', $current_semester_id)
            ->where('batch_course.batch_id', '=', $batch_id)
            ->having('year_id', '<=', $current_year_id)->get();

        }elseif(empty($completed_data)){    //////

            $batch_data = Batch::findOrFail($batch_id);

            $current_year_id = $batch_data->year_id;
            $year_title = Year::findOrFail($current_year_id)->title;
            $current_semester_id = $batch_data->semester_id;
            $semester_title = Semester::findOrFail($current_semester_id)->title;

            $batch_courses = BatchCourse::whereNotExists(function ($query) use ($batch_id){
                $query->from('course_enrollment')->whereRaw('course_enrollment.batch_course_id = batch_course.id')
//                    ->where('batch_course.batch_id', '=', $batch_id)
                    ->where('course_enrollment.student_user_id', '=', Auth::user()->get()->id);
                })//->where('semester_id', $current_semester_id)//where('year_id', $current_year_id)
                //->where('semester_id', $current_semester_id)
            ->where('batch_course.batch_id', '=', $batch_id)
                ->having('year_id', '<=', $current_year_id)->get();
        }
            $previous_incomplete_courses = CourseEnrollment::with('relBatchCourse','relBatchCourse.relCourse')->whereIn('status',array('fail','retake'))->get();

            $max_min_credit = BatchCourse::with('relBatch','relBatch.relDegree')->first();

            $credit_in_current_semester = DB::table('course_enrollment')
            ->select(DB::raw('SUM(course.credit) as enrolled_credit'))
            ->leftJoin('batch_course', 'course_enrollment.batch_course_id', '=', 'batch_course.id')
            ->leftJoin('course', 'batch_course.course_id', '=', 'course.id')
            ->where('course_enrollment.status', '=', 'enrolled')
            ->first();

        return View::make('academic::student.courses.enrollment',compact('batch_courses', 'year_title', 'semester_title',
                        'current_year_id', 'current_semester_id','previous_incomplete_courses','max_min_credit','credit_in_current_semester'
        ));
    }

	public function acmCoursesEnrollment()
	{
        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
        $degree_id = Batch::where('id','=',$batch_id)->first()->degree_id;
        $max_credit = Degree::where('id','=',$degree_id)->first()->credit_max_per_semester;
        $min_credit = Degree::where('id','=',$degree_id)->first()->credit_min_per_semester;

        $checked_ids = Input::get('ids');
        $taken_in_year = Input::get('taken_in_year');
        $taken_in_semester = Input::get('taken_in_semester');
        $student_user_id = Auth::user()->get()->id;

        $year_title = Year::findOrFail($taken_in_year)->title;
        $semester_title = Semester::findOrFail($taken_in_semester)->title;

        //TODO : Credit Limit Using JS
        $sem_count = count($checked_ids) * 3;

        if($checked_ids ){

            foreach($checked_ids as $key => $value){
                $model = new CourseEnrollment();
                $model->batch_course_id = $value;
                $model->student_user_id = $student_user_id;
                $model->taken_in_year_id = $taken_in_year;
                $model->taken_in_semester_id = $taken_in_semester;
                $model->status ='1';
                if($sem_count > $max_credit){
                    Session::flash('danger', "Credit Limit exceed. Max Limit is 18!");
                }elseif($sem_count < $min_credit){
                    Session::flash('danger', "Credit Limit exceed.Min Limit is 6!");
                }
                else{
                    $model->save();
                    Session::flash('message', "Successfully added Courses For Enrollment!");
                }
            }
            return Redirect::route('academic.student.course-enrollment.tution-fees',['year'=>$year_title,'semester'=>$semester_title]);
        }else{
            Session::flash('info', "Please select course for enrollment!");
            return Redirect::back();
        }
	}

    public function acmCoursesTutionFees($year_title,$semester_title){

        $enrolled_courses = CourseEnrollment::where('status', 'enrolled')->orderBy('id', 'DESC')->get();

        $total_credit = DB::table('course_enrollment')
            ->select(DB::raw('SUM(course.credit) as total_credit'))
            ->leftJoin('batch_course', 'course_enrollment.batch_course_id', '=', 'batch_course.id')
            ->leftJoin('course', 'batch_course.course_id', '=', 'course.id')
            ->where('course_enrollment.status', '=', 'enrolled')
            ->first();

        return View::make('academic::student.courses.tution_fees',compact('enrolled_courses','year_title','semester_title', 'total_credit','semester_title'));
    }

    public function acmCoursesStatus($id, $value){

        if($value=='revoked'){
            $model =  CourseEnrollment::find($id);
            $model->status = $value;
            $model->save();
        }elseif($value=='invoked'){
            $model =  CourseEnrollment::find($id);
            $model->status = $value;
            $model->save();
        }
        return Redirect::back();
    }


    public function showObtainedMarks($batch_course_id){

        $courses = CourseEnrollment::with('relBatchCourse','relBatchCourse.relCourse')
            ->where('batch_course_id','=',$batch_course_id)->first();

        $course_id = BatchCourse::find($batch_course_id)->course_id;
        if($course_id){
            $course_conduct = CourseConduct::where('course_id','=',$course_id)->first();
        }

        if($course_conduct){
           //$data = obtained_marks_item
            $data = AcmMarksDistribution::with('relAcmMarksDistItem')->where('course_conduct_id', $course_conduct->id)->get();

            $dist_item_clss = AcmMarksDistItem::where('code', 'clss')->first();
            $dist_item_clst = AcmMarksDistItem::where('code', 'clst')->first();
            $dist_item_assignment = AcmMarksDistItem::where('code', 'assn')->first();
            $dist_item_midterm = AcmMarksDistItem::where('code', 'midt')->first();
            $dist_item_termfinal = AcmMarksDistItem::where('code', 'fint')->first();

            if($dist_item_clss){
                $class = AcmAcademic::whereExists(function($query) use($dist_item_clss){
                    $query->from('acm_marks_distribution')->whereRaw('acm_academic.acm_marks_distribution_id =  acm_marks_distribution.id')
                        ->where('acm_marks_distribution.acm_marks_dist_item_id', $dist_item_clss->id);
                })
                    ->where('course_conduct_id', $course_conduct->id )->get();
            }

            if($dist_item_clst){
                $class_test = AcmAcademic::whereExists(function($query) use($dist_item_clst){
                    $query->from('acm_marks_distribution')->whereRaw('acm_academic.acm_marks_distribution_id =  acm_marks_distribution.id')
                        ->where('acm_marks_distribution.acm_marks_dist_item_id', $dist_item_clst->id);
                })
                    ->where('course_conduct_id', $course_conduct->id )->get();
            }

            if($dist_item_assignment){
                $assignment = AcmAcademic::whereExists(function($query) use($dist_item_assignment){
                    $query->from('acm_marks_distribution')->whereRaw('acm_academic.acm_marks_distribution_id =  acm_marks_distribution.id')
                        ->where('acm_marks_distribution.acm_marks_dist_item_id', $dist_item_assignment->id);
                })
                    ->where('course_conduct_id', $course_conduct->id )->get();
            }

            if($dist_item_midterm){
                $midterm = AcmAcademic::whereExists(function($query) use($dist_item_midterm){
                    $query->from('acm_marks_distribution')->whereRaw('acm_academic.acm_marks_distribution_id =  acm_marks_distribution.id')
                        ->where('acm_marks_distribution.acm_marks_dist_item_id', $dist_item_midterm->id);
                })
                    ->where('course_conduct_id', $course_conduct->id )->get();
            }

            if($dist_item_termfinal){
                $term_final = AcmAcademic::whereExists(function($query) use($dist_item_termfinal){
                    $query->from('acm_marks_distribution')->whereRaw('acm_academic.acm_marks_distribution_id =  acm_marks_distribution.id')
                        ->where('acm_marks_distribution.acm_marks_dist_item_id', $dist_item_termfinal->id);
                })
                    ->where('course_conduct_id', $course_conduct->id )->get();
            }
        }
        return View::make('academic::student.courses.acm_course_items.obtained_marks',compact('courses','class','class_test',
            'assignment','midterm','term_final','batch_course_id', 'data'));
    }

    public function viewClass($id){

        $model = AcmAcademic::find($id);
        return View::make('academic::student.modals.class_view',compact('model'));
    }

    public function viewAssignment($id){

        $model = AcmAcademic::find($id);
        return View::make('academic::student.modals.assignment_view',compact('model'));
    }

	public function acmExamEnrollment($batch_course_id){

        return View::make('academic::student.courses.enroll_exam',compact('batch_course_id'));
    }

    public function acmCheckout($year_title,$semester_title){
        return View::make('academic::student.courses.checkout',compact('year_title','semester_title'));
    }
}
