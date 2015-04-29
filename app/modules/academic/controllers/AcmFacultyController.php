<?php

class AcmFacultyController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('academicFaculty', array('except' => array('')));
        //$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }

//*********************Marks Distribution at Courses Start(R)*************************

    public function  index()
    {
        $title = 'Course List';
        $faculty_id = Auth::user()->get()->id;
        $datas = CourseConduct::latest('id')->with('relCourse', 'relCourse.relCourseType', 'relYear', 'relSemester', 'relDegree', 'relDegree.relDepartment')
            ->where('faculty_user_id', '=', $faculty_id)
            ->get();
        return View::make('academic::faculty.mark_distribution_courses.index', compact(
            'title', 'datas'));
    }

    public function course_marks_dist_show($cc_id, $course_id)
    {
        $datas = CourseConduct::with('relCourse', 'relCourse.relCourseType', 'relYear', 'relSemester', 'relDegree', 'relDegree.relDepartment')
            ->where('id', '=', $cc_id)
            ->get();

        $data = CourseConduct::with('relCourse', 'relCourse.relCourseType')
            ->where('course_id', '=', $course_id)
            ->first();

        $config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->get();

        $coursetitle = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->first();

        $totalmarks = DB::table('acm_marks_distribution')
            ->select(DB::raw('sum(marks) AS marks'))
            ->where('course_conduct_id', $cc_id)->get();

        //$data->id now contains the course_conduct_id

        /*$acm_marks_distribution = AcmMarksDistribution::where('course_conduct_id', '=', $data->id)->get();

        if (isset($acm_marks_distribution[0]) != null) {
            // $result = $acm_marks_distribution;
            $result = DB::table('acm_marks_distribution')
                ->select(
                    'acm_marks_distribution.id as isMarksId',
                    'acm_marks_distribution.acm_marks_dist_item_id as item_id',
                    'acm_marks_dist_item.title as acm_dist_item_title',
                    'acm_marks_distribution.marks as actual_marks',
                    'acm_marks_distribution.is_readonly as readonly',
                    'acm_marks_distribution.is_default as default_item',
                    'acm_marks_distribution.is_attendance',
                    'acm_marks_distribution.created_by as CBid',
                    'acm_marks_distribution.acm_marks_policy',
                    'course.id as course_id2'
                )
                ->join('course_conduct', 'acm_marks_distribution.course_conduct_id', '=', 'course_conduct.id')
                ->join('course', 'course_conduct.course_id', '=', 'course.id')
                ->join('acm_marks_dist_item', 'acm_marks_distribution.acm_marks_dist_item_id', '=', 'acm_marks_dist_item.id')
                ->where('acm_marks_distribution.course_conduct_id', $data->id)
                ->get();
        } else {
            $result = DB::table('acm_course_config')
                ->select(
                    'acm_course_config.id as isConfigId',
                    'acm_course_config.acm_marks_dist_item_id as item_id',
                    'acm_course_config.readonly',
                    'acm_course_config.default_item',
                    'acm_course_config.is_attendance',
                    'acm_course_config.created_by',
                    'acm_course_config.marks as actual_marks',
                    'acm_marks_dist_item.title as acm_dist_item_title',
                    'course.id as course_id2',
                    'course.evaluation_total_marks as evaluation_total_marks'
                )
                ->join('course', 'acm_course_config.course_id', '=', 'course.id')
                ->join('acm_marks_dist_item', 'acm_course_config.acm_marks_dist_item_id', '=', 'acm_marks_dist_item.id')
                ->where('course.id', $course_id)
                ->get();
        }*/

        return View::make('academic::faculty.mark_distribution_courses.show', compact('datas', 'data', 'config_data', 'coursetitle', 'totalmarks', 'result'));
    }


    public function marks_dist_show($cc_id)
    {
        $dist_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->get();

        $coursetitle = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->first();

        $totalmarks = DB::table('acm_marks_distribution')
            ->select(DB::raw('sum(marks) AS marks'))
            ->where('course_conduct_id', $cc_id)->get();

        return View::make('academic::faculty.mark_distribution_courses.show_marks_distribution', compact('dist_data', 'coursetitle', 'totalmarks'));
    }

    public function find_marksdist_info($course_id, $cc_id)
    {
        $data = CourseConduct::with('relCourse', 'relCourse.relCourseType')
            ->where('course_id', '=', $course_id)
            ->first();

        $totalmarks = DB::table('acm_marks_distribution')
            ->select(DB::raw('sum(marks) AS marks'))
            ->where('course_conduct_id', $cc_id)->get();

        //$data->id now contains the course_conduct_id

        $acm_marks_distribution = AcmMarksDistribution::where('course_conduct_id', '=', $data->id)->get();

        if (isset($acm_marks_distribution[0]) != null) {
            // $result = $acm_marks_distribution;
            $result = DB::table('acm_marks_distribution')
                ->select(
                    'acm_marks_distribution.id as isMarksId',
                    'acm_marks_distribution.acm_marks_dist_item_id as item_id',
                    'acm_marks_dist_item.title as acm_dist_item_title',
                    'acm_marks_distribution.marks as actual_marks',
                    'acm_marks_distribution.is_readonly as readonly',
                    'acm_marks_distribution.is_default as default_item',
                    'acm_marks_distribution.is_attendance',
                    'acm_marks_distribution.created_by as CBid',
                    'acm_marks_distribution.acm_marks_policy',
                    'course.id as course_id2'
                )
                ->join('course_conduct', 'acm_marks_distribution.course_conduct_id', '=', 'course_conduct.id')
                ->join('course', 'course_conduct.course_id', '=', 'course.id')
                ->join('acm_marks_dist_item', 'acm_marks_distribution.acm_marks_dist_item_id', '=', 'acm_marks_dist_item.id')
                ->where('acm_marks_distribution.course_conduct_id', $data->id)
                ->get();
        } else {
            $result = DB::table('acm_course_config')
                ->select(
                    'acm_course_config.id as isConfigId',
                    'acm_course_config.acm_marks_dist_item_id as item_id',
                    'acm_course_config.readonly',
                    'acm_course_config.default_item',
                    'acm_course_config.is_attendance',
                    'acm_course_config.created_by',
                    'acm_course_config.marks as actual_marks',
                    'acm_marks_dist_item.title as acm_dist_item_title',
                    'course.id as course_id2',
                    'course.evaluation_total_marks as evaluation_total_marks'
                )
                ->join('course', 'acm_course_config.course_id', '=', 'course.id')
                ->join('acm_marks_dist_item', 'acm_course_config.acm_marks_dist_item_id', '=', 'acm_marks_dist_item.id')
                ->where('course.id', $course_id)
                ->get();
        }
        return View::make('academic::faculty.mark_distribution_courses.show_marks_dist_to_insert', compact('result', 'data', 'totalmarks'));
    }

    public function save_acm_marks_distribution_data()
    {
        $data = Input::all();
        $Default_item = Input::get('isDefault');
        $course_management_id = Input::get('course_conduct_id');
        $course_type_id = Input::get('course_type_id');
        $isAttendance = Input::get('isAttendance');
        $ReadOnly = Input::get('isReadOnly');
        $acm_marks_distribution_id = Input::get('acm_marks_distribution_id');
        $acm_item_id = Input::get('acm_marks_dist_item_id');
        $acm_marks_policy = Input::get('policy_id');
        $actual_marks = Input::get('actual_marks');
        $created_by_amw = Input::get('created_by_amw');
        $count = count($acm_item_id);
        for ($i = 0; $i < $count; $i++) {
            $marks_dist = (isset($acm_marks_distribution_id[$i])) ? AcmMarksDistribution::find($acm_marks_distribution_id[$i]) : new AcmMarksDistribution;
            $marks_dist->course_conduct_id = $course_management_id;
            $marks_dist->acm_marks_dist_item_id = $acm_item_id[$i];
            $marks_dist->marks = $actual_marks[$i];
            $marks_dist->acm_marks_policy = $acm_marks_policy[$i];

            $marks_dist->is_default = 0;
            if ($Default_item) {
                foreach ($Default_item as $isd) {
                    if ($isd == $i)
                        $marks_dist->is_default = 1;

                }
            }
            $marks_dist->is_attendance = 0;
            if ($isAttendance) {
                foreach ($isAttendance as $isa) {
                    if ($isa == $i) {
                        $marks_dist->is_attendance = 1;
                        $check_data = AcmAttendanceConfig::where('course_type_id', '=', $course_type_id)->first();
                        if (count($check_data) > 0) {
                            $acm_config = AcmAttendanceConfig::find($check_data->id);
                            $acm_config->course_type_id = $course_type_id;
                            $acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
                            $acm_config->save();
                            // $attendance_id = $acm_config->id;//to get last inserted id
                        } else {
                            $acm_config = new AcmAttendanceConfig;
                            $acm_config->course_type_id = $course_type_id;
                            $acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
                            $acm_config->save();
                            //$attendance_id = $acm_config->id;//to get last inserted id
                        }
                    }
                }
            }
            $marks_dist->is_readonly = 0;
            if ($ReadOnly) {
                foreach ($ReadOnly as $isr) {
                    if ($isr == $i)
                        $marks_dist->is_readonly = 1;
                }
            }
            // Assign created_by and updated_by user id
            if (isset($created_by_amw) && isset($created_by_amw[$i]))
                $marks_dist->created_by = $created_by_amw[$i];
            elseif (!isset($acm_marks_distribution_id[$i]))
                $marks_dist->created_by = Auth::user()->get()->id;
            else
                $marks_dist->updated_by = Auth::user()->get()->id;
            //$marks_dist->acm_attendance_config_id = $attendance_id;
            $marks_dist->save();
            //$acm_config->acm_attendance_config_id->save($marks_dist);
        }
        // redirect
        Session::flash('message', 'Successfully Added Marks Distribution item!');
        return Redirect::back();
    }

    //Ajax delete in modal
    public function ajax_delete_acm_marks_dist()
    {
        if (Request::ajax()) {
            $acm_marks_distribution_id = Input::get('acm_marks_distribution_id');
            $data = AcmMarksDistribution::find($acm_marks_distribution_id);
            if ($data->delete())
                return Response::json(['msg' => 'Data Successfully Deleted']);
            else
                return Response::json(['msg' => 'Data Successfully Not Deleted']);
        }
    }

    //************************Marks Distribution Item  ***********************

    public function item_index($marks_dist_id, $cc_id, $item_id)
    {
        $marks_dist_item_id = $item_id;
        $marks_dist = $marks_dist_id;
        $course_con_id = $cc_id;
        $date_time = array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
        $datas = AcmAcademic::with('relAcmClassSchedule')
            ->where('acm_marks_distribution_id', '=', $marks_dist_id)
            ->get();

        $data = CourseConduct::with('relCourse')
            ->where('id', '=', $cc_id)
            ->get();

        $config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->get();

        $coursetitle = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->first();

        return View::make('academic::faculty.mark_distribution_courses.marks_dist_item.index', compact('marks_dist', 'course_con_id', 'datas', 'config_data', 'data', 'marks_dist_id', 'cmid', 'date_time', 'coursetitle', 'marks_dist_item_id'));
    }

    public function save_marksdist_item_data()
    {
        $data = Input::all();
        $redirect_url = Input::get('redirect_url');
        $datas = new AcmAcademic();
        if ($datas->validate($data)) {
            $datas->course_conduct_id = Input::get('course_conduct_id');
            $datas->acm_marks_distribution_id = Input::get('marks_dist_id');
            $datas->title = Input::get('title');
            $flashmsg = $datas->title;
            $datas->description = Input::get('description');
            $datas->acm_class_schedule_id = Input::get('class_schedule');
            $datas->status = 1;
            $datas->save();
            $academic_id = $datas->id;//to get last inserted id
            //file upload starts here
            $files = Input::file('images');
            foreach ($files as $file) {
                if ($file) {
                    $destinationPath = public_path() . '/file/item_class_file';
                    $filename = $file->getClientOriginalName();
                    $hashname = date("d-m-Y") . "_" . $filename;
                    $upload_success = $file->move($destinationPath, $hashname);
                    $academic_details = new AcmAcademicDetails;
                    $academic_details->file = $hashname;
                    $academic_details->acm_academic_id = $academic_id;
                    $academic_details->save();
                }
            }
            //file upload ends
            Session::flash('message', "Successfully Added $flashmsg !");
            return Redirect::back();
        } else {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function item_show($id)
    {
        $data = AcmAcademic::with('relAcmClassSchedule', 'relAcmClassSchedule.relAcmClassTime')
            ->where('id', '=', $id)
            ->get();

        $item_title = AcmAcademic::with('relAcmClassSchedule', 'relAcmClassSchedule.relAcmClassTime')
            ->where('id', '=', $id)
            ->first();

        $datas = AcmAcademicDetails::with('relAcmAcademic')
            ->where('acm_academic_id', '=', $id)
            ->get();

        return View::make('academic::faculty.mark_distribution_courses.marks_dist_item.show', compact('data', 'datas', 'item_title'));
    }

    public function item_edit($id)
    {
        $date_time = array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
        $model = new AcmAcademic();
        $edit_data = $model->find($id);
        $datas = AcmAcademicDetails::with('relAcmAcademic')
            ->where('acm_academic_id', '=', $id)
            ->get();

        $item_title = AcmAcademic::with('relAcmClassSchedule', 'relAcmClassSchedule.relAcmClassTime')
            ->where('id', '=', $id)
            ->first();

        return View::make('academic::faculty.mark_distribution_courses.marks_dist_item.edit', compact('edit_data', 'date_time', 'datas','item_title'));
    }

    public function update_class($id)
    {
        $data = Input::all();
        //$redirect_url = Input::get('redirect_url');
        if (($data)) {
            $datas = AcmAcademic::find($id);
            $datas->title = Input::get('title');
            $flashmsg = $datas->title;
            $datas->description = Input::get('description');
            $datas->acm_class_schedule_id = Input::get('class_schedule');
            $datas->save();
            $academic_id = $id;// update exiting data that contains a id
            //file upload starts here
            $files = $data['images'];
            foreach ($files as $file) {
                if ($file) {
                    $destinationPath = public_path() . '/file/item_class_file';
                    $filename = $file->getClientOriginalName();
                    $hashname = date("d-m-Y") . "_" . $filename;
                    $upload_success = $file->move($destinationPath, $hashname);
                    $academic_details = new AcmAcademicDetails;
                    $academic_details->file = $hashname;
                    $academic_details->acm_academic_id = $id;
                    $academic_details->save();
                }
            }
            //file upload ends
            Session::flash('message', "Successfully Updated $flashmsg !");
            //return Redirect::to($redirect_url);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }

    public function ajax_delete_aca_academic_details()
    {
        if (Request::ajax()) {
            $aca_academic_details_id = Input::get('aca_academic_details_id');
            $token = Input::get('token');
            if (Session::token() == $token) {
                $data = AcmAcademicDetails::find($aca_academic_details_id);
                if ($data->delete()) {
                    return Response::json(['msg' => 'Data Successfully Deleted']);
                } else
                    return Response::json(['msg' => 'Data Successfully Not Deleted']);
            }

        }
    }

    //***************assign Item****************
    /**
     * @param $acm_id
     * @param $cm_id
     * @param $mark_dist_id
     * @return mixed
     */
    public function item_assign($acm_id, $cc_id, $mark_dist_id, $course_id)
    {

        $course_list = CourseConduct::findOrFail($cc_id);
        /*$course_enroll = CourseEnrollment::with(['relUser', 'relBatchCourse'=> function($query) use($course_list){
            $query->where('course_id', $course_list->course_id);
            }])
        ->where('taken_in_year_id', $course_list->year_id)
        ->where('taken_in_semester_id', $course_list->semester_id)
        ->where('status', 'enrolled')
        ->get();*/

        $course_enroll = CourseEnrollment::with('relUser')
            ->whereExists(function($query) use($course_list)
            {
                $query->from('batch_course')
                    ->whereRaw('batch_course.id = course_enrollment.batch_course_id')
                    ->where('batch_course.course_id', $course_list->course_id);
            })
        ->where('taken_in_year_id', $course_list->year_id)
        ->where('taken_in_semester_id', $course_list->semester_id)
        ->where('status', 'enrolled')
        ->get();

        $acm = AcmAcademic::with('relAcmClassSchedule')
            ->where('id', '=', $acm_id)
            ->first();

        $exam_questions = array('' => 'Select Examination Question') + ExmQuestion::lists('title', 'id');

        $data = CourseConduct::with('relCourse')
            ->where('id', '=', $cc_id)
            ->get();

        $config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseConduct.relCourse')
            ->where('course_conduct_id', '=', $cc_id)
            ->get();

        return View::make('academic::faculty.mark_distribution_courses.marks_dist_item.assign', compact('course_enroll','acm','exam_questions', 'data', 'config_data'));
    }

    public function batch_assign_item()
    {
        $data = Input::all();
        $chk = Input::get('chk');
        $aca_id = Input::get('acm_academic_id');
        $exam_id = Input::get('exam_question');

        if (Input::get('assign')) {
            if ($chk) {
                foreach ($chk as $key => $value) {
                    $model = AcmAcademicAssignStudent::find($value);
                    if ($aca_id) {
                        $model->acm_academic_id = $aca_id;
                    }
                    if ($exam_id) {
                        $model->exm_question_id = $exam_id;
                    }
                    if (Auth::user()->check()) {
                        $model->assigned_by = Auth::user()->get()->id;
                    }
                    $model->status = 'A';
                    $model->save();
                }
                return Redirect::back()->with('message', 'Successfully added!');
            } else {
                return Redirect::back()->with('error', "You didn't select any Item !");
            }
        }
        if (Input::get('revoke')) {
            if ($chk) {
                foreach ($chk as $key => $value) {
                    $model = AcmAcademicAssignStudent::find($value);
                    if ($aca_id) {
                        $model->acm_academic_id = $aca_id;
                    }
                    $model->status = 'NA';
                    $model->save();
                }
                return Redirect::back()->with('message', 'Successfully Revoked!');
            } else {
                return Redirect::back()->with('error', "You didn't select any Item !");
            }
        }
    }

    public function comments_assign_item($assign_std_id)
    {
        $assign_std = AcmAcademicAssignStudent::with('relAcmAcademic', 'relAcmAcademic.relCourseManagement')
            ->where('id', '=', $assign_std_id)
            ->first();//Execute the query and get the first result.

        $comments_info = AcmAcademicAssignStudentComments::with('relAcmAcademicAssignStudent')
            ->where('acm_assign_std_id', '=', $assign_std_id)
            ->get();//Execute the query as a "select" statement.

        return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.ct_comments', compact('assign_std', 'comments_info'));

    }

    public function save_comments()
    {
        $data = Input::all();
        $acm_assign_id = Input::get('assign_stu_user_id');
        $comments = Input::get('comments');
        $datas = new AcmAcademicAssignStudentComments();
        if ($data) {
            $datas->acm_assign_std_id = $acm_assign_id;
            $datas->comments = $comments;
            //	$datas->commented_by = Auth::user()->get()->id;
            $datas->save();
            //file upload ends
            return Redirect::back()->with('message', 'Successfully added!');
        } else {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);
            return Redirect::to('academic/faculty/marks-dist-item/class_test/assign/');
        }
    }

}