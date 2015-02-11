<?php

class AcmFacultyController extends \BaseController {

//    function __construct() {
//        $this->beforeFilter('academicFaculty', array('except' => array('index')));
//    }

//**********************Start faculty code********************

	public function  index()
	{
		$datas= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment','relCourseType')
			->get();
		return View::make('academic::mark_distribution_courses.faculty.index')->with('title', 'Course List')->with('datas', $datas);
	}

	public function course_marks_dist_show($cm_id)
	{
		$data= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment')
			->where('id', '=', $cm_id)
			->get();

		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse','relAcmMarksPolicy')
			->where('course_management_id', '=', $cm_id)
			->get();

		return View::make('academic::mark_distribution_courses.faculty.show')->with(['data'=>$data,
			'config_data'=>$config_data]);
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
					'acm_marks_distribution.is_readonly as readonly',
					'acm_marks_distribution.is_default as default_item',
					'acm_marks_distribution.is_attendance',
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
		return View::make('academic::mark_distribution_courses.faculty.show_marks_dist_to_insert')->with('course_result',$result)->with('datas',$data);
	}


	public function save_acm_marks_distribution_data()
	{
		$data = Input::all();
		$acm_marks_policy_id = Input::get('policy_id');
		//print_r($acm_marks_policy_id);exit;

		$isDefault = Input::get('isDefault');
		$course_management_id = Input::get('course_management_id');
		$course_type_id = Input::get('course_type_id');
		$isAttendance = Input::get('isAttendance');
		$isReadOnly = Input::get('isReadOnly');

		$acm_marks_distribution_id=Input::get('acm_marks_distribution_id');
		$acm_item_id = Input::get('acm_marks_dist_item_id');
		//$acm_marks_policy_id = Input::get('policy_id');
		//print_r($acm_marks_policy_id);exit;
		$actual_marks = Input::get('actual_marks');
		$count = count($acm_item_id);

		for($i=0; $i < $count; $i++)
		{
			$marks_dist = (isset($acm_marks_distribution_id[$i])) ? AcmMarksDistribution::find($acm_marks_distribution_id[$i]) : new AcmMarksDistribution;
			$marks_dist->course_management_id = $course_management_id;
			$marks_dist->acm_marks_dist_item_id = $acm_item_id[$i];
			$marks_dist->marks = $actual_marks[$i];
			$marks_dist->acm_marks_policy_id = $acm_marks_policy_id[$i];

			$marks_dist->is_default = 0;
			if($isDefault){
				foreach($isDefault as $isd){
					if($isd == $i)
						$marks_dist->is_default = 1;
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
							// $attendance_id = $acm_config->id;//to get last inserted id
						}
					}
				}
			}
			$marks_dist->is_readonly = 0;
			if($isReadOnly){
				foreach($isReadOnly as $isr){
					if($isr == $i)
						$marks_dist->is_readonly = 1;
				}
			}
			// $marks_dist->acm_attendance_config_id = $attendance_id;
			$marks_dist->save();

		}

		// redirect
		Session::flash('message', 'ACM Course Configuration Data Successfully Added !!');
		return Redirect::to('academic/faculty');
	}

//End code


}
