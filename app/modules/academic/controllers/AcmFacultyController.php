<?php

class AcmFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicFaculty', array('except' => array('')));
		//$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }
	//*******courses marks distribution************
	public function  index()
	{
		$title = 'Course List';
		$faculty_id = Auth::user()->id;
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
							// $attendance_id = $acm_config->id;//to get last inserted id
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
			// $marks_dist->acm_attendance_config_id = $attendance_id;

			// Assign created_by and updated_by user id
			if( isset($created_by_amw) && isset($created_by_amw[$i]) )
				$marks_dist->created_by = $created_by_amw[$i];
			elseif(!isset($acm_marks_distribution_id[$i]))
				$marks_dist->created_by = Auth::user()->id;
			else
				$marks_dist->updated_by = Auth::user()->id;

			$marks_dist->save();

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
	//*******marks distribution item class************
//	public function class_index($md_id)
//	{
//		$data= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment')
//			  ->where('id', '=', $md_id)
//			  ->get();
//		$config_data = AcmMarksDistribution::with('relAcmMarksDistItem', 'relCourseManagement.relCourse')
//			        ->where('course_management_id', '=', $md_id)
//		        	->get();
//		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class.index')->with(['data'=>$data,
//			'config_data'=>$config_data]);
//	}
	public function class_index()
	{
		return View::make('academic::faculty.mark_distribution_courses.marks_dist_item_class.index');
	}
	public function find_marksdist_item_info($md_id)
	{

	}

	public function save_marksdist_item_class_data()
	{
		$data = Input::all();
		// create a new model instance
		$datas = new AcmAcademic();
		// attempt validation
		if ($datas->validate($data)) {
			$datas->title = Input::get('title');
			$datas->description = Input::get('description');
			$datas->created_by = Auth::user()->id;
			$datas->save();

			// redirect
			Session::flash('message', 'Successfully Added!');
			return Redirect::to('academic/faculty/marksdistitem/class');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/faculty/marksdistitem/class');
		}
	}


}
