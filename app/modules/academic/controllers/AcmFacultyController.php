<?php

class AcmFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicFaculty', array('except' => array('')));
		//$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }

	//*********************Marks Distribution at Courses Start***********************************

	public function  index()
	{
		$title = 'Course List';
		$faculty_id = Auth::user()->get()->id;
		$datas= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment','relCourseType')
				->where('user_id', '=', $faculty_id)
				->get();
		return View::make('academic::faculty.mark_distribution_courses.index', compact(
				'title', 'datas'
		));
	}

	public function course_marks_dist_show($cm_id)
	{
		$data= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment')
			->where('id', '=', $cm_id)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.show')->with(['data'=>$data,
			'config_data'=>$config_data]);
	}
	public function marks_dist_show($cm_id)
	{
		$dist_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();

		return View::make('academic::faculty.mark_distribution_courses.show_marks_distribution')->with(
			'dist_data',$dist_data);
	}

	public function find_marksdist_info($course_id)
	{
		$data= CourseManagement::with('relCourseType', 'relCourse')
			->where('course_id', '=', $course_id)
			->first();

		//$data->id now contains the course_management_id

		$acm_marks_distribution = AcmMarksDistribution::where('course_management_id', '=', $data->id)->get();

		if(isset($acm_marks_distribution[0])!=null){
			// $result = $acm_marks_distribution;
			$result = DB::table('acm_marks_distribution')
				->select(
					'acm_marks_distribution.id as isMarksId',
					'acm_marks_distribution.acm_marks_dist_item_id as item_id',
					'acm_marks_dist_item.title as acm_dist_item_title',
					'acm_marks_distribution.marks as actual_marks',
					'acm_marks_distribution.readonly as readonly',
					'acm_marks_distribution.default_item as default_item',
					'acm_marks_distribution.is_attendance',
					'acm_marks_distribution.created_by as CBid',
					'acm_marks_distribution.acm_marks_policy',
					'course.id as course_id2'
				)
				->join('course_management','acm_marks_distribution.course_management_id','=', 'course_management.id')
				->join('course','course_management.course_id','=', 'course.id')
				->join('acm_marks_dist_item','acm_marks_distribution.acm_marks_dist_item_id','=', 'acm_marks_dist_item.id')
				->where('acm_marks_distribution.course_management_id', $data->id)
				->get();
		}else{
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
				->join('course','acm_course_config.course_id','=', 'course.id')
				->join('acm_marks_dist_item','acm_course_config.acm_marks_dist_item_id','=', 'acm_marks_dist_item.id')
				->where('course.id', $course_id)
				->get();
		}
		return View::make('academic::faculty.mark_distribution_courses.show_marks_dist_to_insert')->with('course_result',$result)->with('datas',$data);
	}

	public function save_acm_marks_distribution_data()
	{
		$data = Input::all();
		$Default_item = Input::get('isDefault');
		$course_management_id = Input::get('course_management_id');
		$course_type_id = Input::get('course_type_id');
		$isAttendance = Input::get('isAttendance');
		$ReadOnly = Input::get('isReadOnly');
		$acm_marks_distribution_id=Input::get('acm_marks_distribution_id');
		$acm_item_id = Input::get('acm_marks_dist_item_id');
		$acm_marks_policy = Input::get('policy_id');
		$actual_marks = Input::get('actual_marks');
		$created_by_amw = Input::get('created_by_amw');
		$count = count($acm_item_id);
		for($i=0; $i < $count; $i++)
		{
			$marks_dist = (isset($acm_marks_distribution_id[$i])) ? AcmMarksDistribution::find($acm_marks_distribution_id[$i]) : new AcmMarksDistribution;
			$marks_dist->course_management_id = $course_management_id;
			$marks_dist->acm_marks_dist_item_id = $acm_item_id[$i];
			$marks_dist->marks = $actual_marks[$i];
			$marks_dist->acm_marks_policy =$acm_marks_policy[$i];

			$marks_dist->default_item = 0;
			if($Default_item){
				foreach($Default_item as $isd){
					if($isd == $i)
						$marks_dist->default_item = 1;

				}
			}
			$marks_dist->is_attendance = 0;
			if($isAttendance) {
				foreach ($isAttendance as $isa) {
					if ($isa == $i) {
						$marks_dist->is_attendance = 1;
						$check_data = AcmAttendanceConfig::where('course_type_id', '=', $course_type_id)->first();
						if(count($check_data) > 0)
						{
							$acm_config = AcmAttendanceConfig::find($check_data->id);
							$acm_config->course_type_id = $course_type_id;
							$acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
							$acm_config->save();
							// $attendance_id = $acm_config->id;//to get last inserted id
						}
						else
						{
							$acm_config = new AcmAttendanceConfig;
							$acm_config->course_type_id = $course_type_id;
							$acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
							$acm_config->save();
							//$attendance_id = $acm_config->id;//to get last inserted id
						}
					}
				}
			}
			$marks_dist->readonly = 0;
			if($ReadOnly){
				foreach($ReadOnly as $isr){
					if($isr == $i)
						$marks_dist->readonly = 1;
				}
			}
			// Assign created_by and updated_by user id
			if( isset($created_by_amw) && isset($created_by_amw[$i]) )
				$marks_dist->created_by = $created_by_amw[$i];
			elseif(!isset($acm_marks_distribution_id[$i]))
				$marks_dist->created_by = Auth::user()->get()->id;
			else
				$marks_dist->updated_by = Auth::user()->get()->id;
			//$marks_dist->acm_attendance_config_id = $attendance_id;
			$marks_dist->save();
			//$acm_config->acm_attendance_config_id->save($marks_dist);
		}
		// redirect
		Session::flash('message', 'ACM Course Configuration Data Successfully Added !!');
		return Redirect::to('academic/faculty');
	}
    //Ajax delete in modal
	public function ajax_delete_acm_marks_dist()
	{
		if(Request::ajax())
		{
			$acm_marks_distribution_id = Input::get('acm_marks_distribution_id');
			$data = AcmMarksDistribution::find($acm_marks_distribution_id);
			if($data->delete())
				return Response::json(['msg'=> 'Data Successfully Deleted']);
			else
				return Response::json(['msg'=> 'Data Successfully Not Deleted']);
		}
	}

	//************************Marks Distribution Item Class Start************************

	public function class_index($marks_dist_id,$cmid)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$title = 'All Class List';
		$datas = AcmAcademic::with('relAcmClassSchedule')
			->where('acm_marks_distribution_id', '=', $marks_dist_id)
			->get();
		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cmid)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cmid)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class.index', compact('title', 'datas', 'config_data','data', 'marks_dist_id', 'cmid','date_time'));
	}

	public function save_marksdist_item_class_data()
	{
		$data = Input::all();
		$datas = new AcmAcademic();
		if ($datas->validate($data)) {
			$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $datas->id;//to get last inserted id
			//file upload starts here
			$files = Input::file('images');
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $academic_id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marksdistitem/class');
		}
	}
	public function show_class($id)
	{
		$data = AcmAcademic::with('relAcmClassSchedule','relAcmClassSchedule.relAcmClassTime')
			->where('id','=' ,$id)
			->get();
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class.show',compact('data','datas'));
	}
	public function edit_class($id)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$model = new AcmAcademic();
		$edit_data = $model->find($id);
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class.edit',compact('edit_data','date_time','datas'));
	}

	public function update_class($id)
	{
		$data = Input::all();
		$redirect_url = Input::get('redirect_url');
		if (($data)) {
			/*$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');*/
			$datas = AcmAcademic::find($id);
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $id;// update exiting data that contains a id
			//file upload starts here
			$files = $data['images'];
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::to($redirect_url)->with('message','Successfully added!');
		} else {
			// failure, get errors
		//	$errors = $datas->errors();
			//Session::flash('errors', $errors);
			//return Redirect::to($redirect_url)->with('message',$errors);
			return Redirect::to($redirect_url)->with('message','Data not saved');
		}
	}

	public function ajax_delete_aca_academic_details()
	{
		if(Request::ajax())
		{
			$aca_academic_details_id = Input::get('aca_academic_details_id');
			$token = Input::get('token');
			if (Session::token() == $token)
			{
				$data = AcmAcademicDetails::find($aca_academic_details_id);
				if($data->delete())
				{
					return Response::json(['msg'=> 'Data Successfully Deleted']);
				}
				else
					return Response::json(['msg'=> 'Data Successfully Not Deleted']);
			}

		}
	}

	//************************Marks Distribution Item Class Test Start********************

	public function class_test_index($marks_dist_id,$cmid)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$title = 'All Class Test List';
		$datas = AcmAcademic::with('relAcmClassSchedule')
			->where('acm_marks_distribution_id', '=', $marks_dist_id)
			->get();
		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cmid)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cmid)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.index', compact('title', 'datas', 'config_data','data', 'marks_dist_id', 'cmid','date_time'));
	}
	public function save_class_test_data()
	{
		$data = Input::all();
		$datas = new AcmAcademic();
		if ($datas->validate($data)) {
			$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $datas->id;//to get last inserted id
			//file upload starts here
			$files = Input::file('images');
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
//					strtolower ( $filename)
					$academic_details->acm_academic_id = $academic_id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks/dist/item/class_test/');
		}
	}
	public function show_class_test($id)
	{
		$data = AcmAcademic::with('relAcmClassSchedule','relAcmClassSchedule.relAcmClassTime')
			->where('id','=' ,$id)
			->get();
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.show',compact('data','datas'));
	}
	public function edit_class_test($id)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$model = new AcmAcademic();
		$edit_data = $model->find($id);
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.edit',compact('edit_data','date_time','datas'));
	}
	public function update_class_test($id)
	{
		$data = Input::all();
		$redirect_url = Input::get('redirect_url');
		if ($data) {
			/*$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');*/
			$datas = AcmAcademic::find($id);
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $id;// update exiting data that contains a id
			//file upload starts here
			$files = $data['images'];
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::to($redirect_url)->with('message','Successfully added!');
		} else {
			// failure, get errors
			//$errors = $datas->errors();
			//Session::flash('errors', $errors);
			//return Redirect::to($redirect_url)->with('message',$errors);
			return Redirect::to($redirect_url)->with('message','data not updated');
		}
	}
	public function ajax_delete_aca_academic_details_class_test()
	{
		if(Request::ajax())
		{
			$aca_academic_details_id = Input::get('aca_academic_details_id');
			$token = Input::get('token');
			if (Session::token() == $token)
			{
				$data = AcmAcademicDetails::find($aca_academic_details_id);
				if($data->delete())
				{
					return Response::json(['msg'=> 'Data Successfully Deleted']);
				}
				else
					return Response::json(['msg'=> 'Data Successfully Not Deleted']);
			}

		}
	}

	//***************assign class test****************

	/**
	 * @param $acm_id
	 * @param $cm_id
	 * @param $mark_dist_id
	 * @return mixed
     */
	public  function assign_class_test($acm_id, $cm_id, $mark_dist_id)
	{
		//$model = AcmAcademicAssignStudent::get();
		/*if($model){
			echo "OK";
		}else {
			echo "M";
		}exit;*/
		$acm= AcmAcademic::with('relAcmClassSchedule')
			->where('id', '=', $acm_id)
			->first();
//		$acm_data = AcmAcademic::with('relAcmClassSchedule','relCourseManagement.relSemester','relCourseManagement.relYear','relCourseManagement.relUser','relCourseManagement.relCourse.relSubject.relDepartment')
//			->where('id', '=', $acm_id)
//			->get();
		$exam_questions= array('' => 'Select Examination Question') + ExmQuestion::lists('title', 'id');
		$cm_data = CourseManagement::with('relSemester','relYear','relUser','relCourse.relSubject.relDepartment')
			//->where('course_management_id','=' ,$cm_id)
			//->where('year_id','=' , 17)
			//->where('semester_id','=' ,$cm_id)
			//->where('course_id','=' , 1)
			//->where('department_id','=' , 1)
			->get();

		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cm_id)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.assign',compact('acm','data','config_data','exam_questions','cm_data'));
	}
	public function batch_assign_class_test()
	{
		$data=Input::all();
		$chk=Input::get('chk');
		$aca_id=Input::get('acm_academic_id');
		$exam_id=Input::get('exam_question');
		if(Input::get('assign')) {
			foreach($chk as $key => $value) {
			$model = new AcmAcademicAssignStudent();
			$model->acm_academic_id = $aca_id;
			$model->exm_question_id = $exam_id;
			$model->assigned_by = Auth::user()->get()->id;
			$model->status = 'A';
			$model->user_id = $value;
			$model->save();
		    }
			return Redirect::back()->with('message','Successfully added!');

		}
		if(Input::get('revoke')) {
			//foreach($chk as $key => $value) {
			//print_r(Request::get('id'));exit;
			$model = new AcmAcademicAssignStudent();
			$model->destroy(Request::get('chk'));
		    return Redirect::back()->with('message','Successfully Deleted!');
 			//}
		}
	}
	public function comments_assign_class_test($assign_std_id)
	{
//		$assign_std= AcmAcademicAssignStudent::with('relAcmAcademic','relAcmAcademic.relCourseManagement')
//			->where('user_id', '=', $assign_std_id)
//			->first();//Execute the query and get the first result.

		$comments_info = AcmAcademicAssignStudentComments::with('relAcmAcademicAssignStudent')
			->where('acm_assign_std_id', '=', $assign_std_id)
			->get();//Execute the query as a "select" statement.

		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class_test.ct_comments',compact('assign_std','comments_info'));

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
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks-dist-item/class_test/assign/');
		}
	}

	//************************Marks Distribution Item Assignment Start********************

	public function assignment_index($marks_dist_id,$cmid)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$title = 'All Assignment List';
		$datas = AcmAcademic::with('relAcmClassSchedule')
			->where('acm_marks_distribution_id', '=', $marks_dist_id)
			->get();
		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cmid)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cmid)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_assignment.index', compact('title', 'datas', 'config_data','data', 'marks_dist_id', 'cmid','date_time'));
	}

	public function save_assignment_data()
	{
		$data = Input::all();
		$datas = new AcmAcademic();
		if ($datas->validate($data)) {
			$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $datas->id;//to get last inserted id
			//file upload starts here
			$files = Input::file('images');
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
//					strtolower ( $filename)
					$academic_details->acm_academic_id = $academic_id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks/dist/item/assignment/');
		}
	}

	public function show_assignment($id)
	{
		$data = AcmAcademic::with('relAcmClassSchedule','relAcmClassSchedule.relAcmClassTime')
			->where('id','=' ,$id)
			->get();
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_assignment.show',compact('data','datas'));
	}
	public function edit_assignment($id)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$model = new AcmAcademic();
		$edit_data = $model->find($id);
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_assignment.edit',compact('edit_data','date_time','datas'));
	}
	public function update_assignment($id)
	{
		$data = Input::all();
		$redirect_url = Input::get('redirect_url');
		if ($data) {
			/*$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');*/
			$datas = AcmAcademic::find($id);
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $id;// update exiting data that contains a id
			//file upload starts here
			$files = $data['images'];
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::to($redirect_url)->with('message','Successfully added!');
		} else {
			// failure, get errors
			//$errors = $datas->errors();
			//Session::flash('errors', $errors);
			//return Redirect::to($redirect_url)->with('message',$errors);
			return Redirect::to($redirect_url)->with('message','data not updated');
		}
	}
	//***************assign assignment****************
	/**
	 * @param $acm_id
	 * @param $cm_id
	 * @param $mark_dist_id
	 * @return mixed
	 */
	public  function assign_assignment($acm_id, $cm_id, $mark_dist_id)
	{
		$acm= AcmAcademic::with('relAcmClassSchedule')
			->where('id', '=', $acm_id)
			->first();
//		$acm_data = AcmAcademic::with('relAcmClassSchedule','relCourseManagement.relSemester','relCourseManagement.relYear','relCourseManagement.relUser','relCourseManagement.relCourse.relSubject.relDepartment')
//			->where('id', '=', $acm_id)
//			->get();
		$exam_questions= array('' => 'Select Examination Question') + ExmQuestion::lists('title', 'id');
		$cm_data = CourseManagement::with('relSemester','relYear','relUser','relCourse.relSubject.relDepartment')
			//->where('course_management_id','=' ,$cm_id)
			//->where('year_id','=' , 17)
			//->where('semester_id','=' ,$cm_id)
			//->where('course_id','=' , 1)
			//->where('department_id','=' , 1)
			->get();

		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cm_id)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_assignment.assign',compact('acm','data','config_data','exam_questions','cm_data'));
	}
	public function batch_assign_assignment()
	{
		$data=Input::all();
		$chk=Input::get('chk');
		$aca_id=Input::get('acm_academic_id');
		$exam_id=Input::get('exam_question');
		if(Input::get('assign')) {
			foreach($chk as $key => $value) {
				$model = new AcmAcademicAssignStudent();
				$model->acm_academic_id = $aca_id;
				$model->exm_question_id = $exam_id;
				$model->assigned_by = Auth::user()->get()->id;
				$model->status = 'A';
				$model->user_id = $value;
				$model->save();
			}
			return Redirect::back()->with('message','Successfully added!');

		}
		if(Input::get('revoke')) {
			foreach($chk as $key => $value) {
				AcmAcademicAssignStudent::destroy(Request::get('id'));
				return Redirect::back()->with('message','Successfully Deleted!');
			}
		}
	}
	public function comments_assign_assignment($assign_std_id)
	{
//		$assign_std= AcmAcademicAssignStudent::with('relAcmAcademic','relAcmAcademic.relCourseManagement')
//			->where('user_id', '=', $assign_std_id)
//			->first();//Execute the query and get the first result.
		$comments_info = AcmAcademicAssignStudentComments::with('relAcmAcademicAssignStudent')
			->where('acm_assign_std_id', '=', $assign_std_id)
			->get();//Execute the query as a "select" statement.
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_assignment.assignment_comments',compact('assign_std','comments_info'));

	}
	public function save_assignment_comments()
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
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks-dist-item/assignment/assign/');
		}
	}
	//************************Marks Distribution Item Mid Term Start********************
	public function midterm_index($marks_dist_id,$cmid)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$title = 'All Midterm List';
		$datas = AcmAcademic::with('relAcmClassSchedule')
			->where('acm_marks_distribution_id', '=', $marks_dist_id)
			->get();
		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cmid)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cmid)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_mid_term.index', compact('title', 'datas', 'config_data','data', 'marks_dist_id', 'cmid','date_time'));
	}
	public function save_midterm_data()
	{
		$data = Input::all();
		$datas = new AcmAcademic();
		if ($datas->validate($data)) {
			$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $datas->id;//to get last inserted id
			//file upload starts here
			$files = Input::file('images');
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
//					strtolower ( $filename)
					$academic_details->acm_academic_id = $academic_id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks/dist/item/midterm/');
		}
	}
	public function show_midterm($id)
	{
		$data = AcmAcademic::with('relAcmClassSchedule','relAcmClassSchedule.relAcmClassTime')
			->where('id','=' ,$id)
			->get();
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_mid_term.show',compact('data','datas'));
	}
	public function edit_midterm($id)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$model = new AcmAcademic();
		$edit_data = $model->find($id);
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_mid_term.edit',compact('edit_data','date_time','datas'));
	}
	public function update_midterm($id)
	{
		$data = Input::all();
		$redirect_url = Input::get('redirect_url');
		if ($data) {
			/*$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');*/
			$datas = AcmAcademic::find($id);
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $id;// update exiting data that contains a id
			//file upload starts here
			$files = $data['images'];
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::to($redirect_url)->with('message','Successfully added!');
		} else {
			// failure, get errors
			//$errors = $datas->errors();
			//Session::flash('errors', $errors);
			//return Redirect::to($redirect_url)->with('message',$errors);
			return Redirect::to($redirect_url)->with('message','Data not updated');
		}
	}
	//***************assign Mid term****************
	/**
	 * @param $acm_id
	 * @param $cm_id
	 * @param $mark_dist_id
	 * @return mixed
	 */
	public  function assign_midterm($acm_id, $cm_id, $mark_dist_id)
	{
		//$model = AcmAcademicAssignStudent::get();
		/*if($model){
			echo "OK";
		}else {
			echo "M";
		}exit;*/
		$acm= AcmAcademic::with('relAcmClassSchedule')
			->where('id', '=', $acm_id)
			->first();
//		$acm_data = AcmAcademic::with('relAcmClassSchedule','relCourseManagement.relSemester','relCourseManagement.relYear','relCourseManagement.relUser','relCourseManagement.relCourse.relSubject.relDepartment')
//			->where('id', '=', $acm_id)
//			->get();
		$exam_questions= array('' => 'Select Examination Question') + ExmQuestion::lists('title', 'id');
		$cm_data = CourseManagement::with('relSemester','relYear','relUser','relCourse.relSubject.relDepartment')
			//->where('course_management_id','=' ,$cm_id)
			//->where('year_id','=' , 17)
			//->where('semester_id','=' ,$cm_id)
			//->where('course_id','=' , 1)
			//->where('department_id','=' , 1)
			->get();

		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cm_id)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_mid_term.assign',compact('acm','data','config_data','exam_questions','cm_data'));
	}
	public function batch_assign_midterm()
	{
		$data=Input::all();
		$chk=Input::get('chk');
		$aca_id=Input::get('acm_academic_id');
		$exam_id=Input::get('exam_question');
		if(Input::get('assign')) {
			foreach($chk as $key => $value) {
				$model = new AcmAcademicAssignStudent();
				$model->acm_academic_id = $aca_id;
				$model->exm_question_id = $exam_id;
				$model->assigned_by = Auth::user()->get()->id;
				$model->status = 'A';
				$model->user_id = $value;
				$model->save();
			}
			return Redirect::back()->with('message','Successfully added!');

		}
		if(Input::get('revoke')) {
			//foreach($chk as $key => $value) {
			//print_r(Request::get('id'));exit;
			$model = new AcmAcademicAssignStudent();
			$model->destroy(Request::get('chk'));
			return Redirect::back()->with('message','Successfully Deleted!');
			//}
		}
	}
	public function comments_assign_midterm($assign_std_id)
	{
//		$assign_std= AcmAcademicAssignStudent::with('relAcmAcademic','relAcmAcademic.relCourseManagement')
//			->where('user_id', '=', $assign_std_id)
//			->first();//Execute the query and get the first result.

		$comments_info = AcmAcademicAssignStudentComments::with('relAcmAcademicAssignStudent')
			->where('acm_assign_std_id', '=', $assign_std_id)
			->get();//Execute the query as a "select" statement.

		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_mid_term.mid_term_comments',compact('assign_std','comments_info'));

	}
	public function save_midterm_comments()
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
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks-dist-item/class_test/assign/');
		}
	}

//************************Marks Distribution Item Final Term Start********************

	public function final_term_index($marks_dist_id,$cmid)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$title = 'All Midterm List';
		$datas = AcmAcademic::with('relAcmClassSchedule')
			->where('acm_marks_distribution_id', '=', $marks_dist_id)
			->get();
		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cmid)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cmid)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_final_term.index', compact('title', 'datas', 'config_data','data', 'marks_dist_id', 'cmid','date_time'));
	}
	public function save_fina_term_data()
	{
		$data = Input::all();
		$datas = new AcmAcademic();
		if ($datas->validate($data)) {
			$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $datas->id;//to get last inserted id
			//file upload starts here
			$files = Input::file('images');
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
//					strtolower ( $filename)
					$academic_details->acm_academic_id = $academic_id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks/dist/item/final/term/');
		}
	}
	public function show_final_term($id)
	{
		$data = AcmAcademic::with('relAcmClassSchedule','relAcmClassSchedule.relAcmClassTime')
			->where('id','=' ,$id)
			->get();
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_final_term.show',compact('data','datas'));
	}
	public function edit_final_term($id)
	{
		$date_time= array('' => 'Select Date') + AcmClassSchedule::lists('day', 'id');
		$model = new AcmAcademic();
		$edit_data = $model->find($id);
		$datas = AcmAcademicDetails::with('relAcmAcademic')
			->where('acm_academic_id','=' ,$id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_final_term.edit',compact('edit_data','date_time','datas'));
	}
	public function update_final_term($id)
	{
		$data = Input::all();
		$redirect_url = Input::get('redirect_url');
		if ($data) {
			/*$datas->course_management_id = Input::get('course_management_id');
			$datas->acm_marks_distribution_id = Input::get('marks_dist_id');*/
			$datas = AcmAcademic::find($id);
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->acm_class_schedule_id = Input::get('class_time');
			$datas->created_by = Auth::user()->get()->id;
			$datas->save();
			$academic_id = $id;// update exiting data that contains a id
			//file upload starts here
			$files = $data['images'];
			foreach($files as $file) {
				if($file){
					$destinationPath = public_path().'/file/item_class_file';
					$filename = $file->getClientOriginalName();
					$hashname = date("d-m-Y")."_".$filename;
					$upload_success = $file->move($destinationPath, $hashname);
					$academic_details = new AcmAcademicDetails;
					$academic_details->file = $hashname;
					$academic_details->acm_academic_id = $id;
					$academic_details->save();
				}
			}
			//file upload ends
			return Redirect::to($redirect_url)->with('message','Successfully added!');
		} else {
			// failure, get errors
			//$errors = $datas->errors();
			//Session::flash('errors', $errors);
			//return Redirect::to($redirect_url)->with('message',$errors);
			return Redirect::to($redirect_url)->with('message','Data not updated');
		}
	}

	//***************assign Final term****************
	/**
	 * @param $acm_id
	 * @param $cm_id
	 * @param $mark_dist_id
	 * @return mixed
	 */
	public  function assign_final_term($acm_id, $cm_id, $mark_dist_id)
	{
		//$model = AcmAcademicAssignStudent::get();
		/*if($model){
			echo "OK";
		}else {
			echo "M";
		}exit;*/
		$acm= AcmAcademic::with('relAcmClassSchedule')
			->where('id', '=', $acm_id)
			->first();
//		$acm_data = AcmAcademic::with('relAcmClassSchedule','relCourseManagement.relSemester','relCourseManagement.relYear','relCourseManagement.relUser','relCourseManagement.relCourse.relSubject.relDepartment')
//			->where('id', '=', $acm_id)
//			->get();
		$exam_questions= array('' => 'Select Examination Question') + ExmQuestion::lists('title', 'id');
		$cm_data = CourseManagement::with('relSemester','relYear','relUser','relCourse.relSubject.relDepartment')
			//->where('course_management_id','=' ,$cm_id)
			//->where('year_id','=' , 17)
			//->where('semester_id','=' ,$cm_id)
			//->where('course_id','=' , 1)
			//->where('department_id','=' , 1)
			->get();

		$data= CourseManagement::with( 'relCourse')
			->where('id', '=', $cm_id)
			->get();
		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
			->where('course_management_id', '=', $cm_id)
			->get();
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_final_term.assign',compact('acm','data','config_data','exam_questions','cm_data'));
	}
	public function batch_assign_final_term()
	{
		$data=Input::all();
		$chk=Input::get('chk');
		$aca_id=Input::get('acm_academic_id');
		$exam_id=Input::get('exam_question');
		if(Input::get('assign')) {
			foreach($chk as $key => $value) {
				$model = new AcmAcademicAssignStudent();
				$model->acm_academic_id = $aca_id;
				$model->exm_question_id = $exam_id;
				$model->assigned_by = Auth::user()->get()->id;
				$model->status = 'A';
				$model->user_id = $value;
				$model->save();
			}
			return Redirect::back()->with('message','Successfully added!');

		}
		if(Input::get('revoke')) {
			//foreach($chk as $key => $value) {
			//print_r(Request::get('id'));exit;
			$model = new AcmAcademicAssignStudent();
			$model->destroy(Request::get('chk'));
			return Redirect::back()->with('message','Successfully Deleted!');
			//}
		}
	}
	public function comments_assign_final_term($assign_std_id)
	{
//		$assign_std= AcmAcademicAssignStudent::with('relAcmAcademic','relAcmAcademic.relCourseManagement')
//			->where('user_id', '=', $assign_std_id)
//			->first();//Execute the query and get the first result.

		$comments_info = AcmAcademicAssignStudentComments::with('relAcmAcademicAssignStudent')
			->where('acm_assign_std_id', '=', $assign_std_id)
			->get();//Execute the query as a "select" statement.

		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_final_term.final_term_comments',compact('assign_std','comments_info'));

	}
	public function save_final_term_comments()
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
			return Redirect::back()->with('message','Successfully added!');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marks-dist-item/final/term/assign/');
		}
	}
}
