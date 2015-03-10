<?php

class AcmAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicAmw', array('except' => array('')));
//		$this->beforeFilter('academicAmw', array('except' => array('index')));
    }


	//*****************Start amw dist item code***********************
	public function amw_index()
	{
		$data = AcmMarksDistItem::orderBy('id', 'ASC')->paginate(5);
		return View::make('academic::amw.mark_distribution_courses.index')->with('datas', $data)->with('title', 'Course Marks Distribution Item List');
	}

	public function amw_save()
	{
		$data = Input::all();
		// create a new model instance
		$datas = new AcmMarksDistItem();
		// attempt validation
		if ($datas->validate($data)) {
			$datas->title = Input::get('title');
			$datas->save();

			// redirect
			Session::flash('message', 'Successfully Added!');
			return Redirect::to('academic/amw/');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/amw/');
		}
	}

	public function store()
	{
		//
	}

	public function amw_show()
	{

	}

	public function amw_edit($id)
	{
		$data = AcmMarksDistItem::find($id);
		return View::make('academic::amw.mark_distribution_courses.edit')->with('editamw', $data);
	}

	public function amw_update($id)
	{
		// get the POST data
		$data = Input::all($id);
		// create a new model instance
		$datas = new AcmMarksDistItem();
		// attempt validation
		if ($datas->validate2($data)) {
			// success code
			$datas = AcmMarksDistItem::find($id);
			$datas->title = Input::get('title');
			$datas->save();
			Session::flash('message', 'Successfully Updated!');
			return Redirect::to('academic/amw/');
		} else {
			// failure, get errors
			$errors = $datas->errors();
			Session::flash('errors', $errors);
			return Redirect::to('academic/amw/');
		}
	}

	public function show_one($id)
	{
		$data = AcmMarksDistItem::find($id);
		return View::make('academic::amw.mark_distribution_courses.show')->with('datas', $data);
	}

	public function amw_delete($id)
	{
		try {
			$data = AcmMarksDistItem::find($id);
			if ($data->delete()) {
				Session::flash('danger', "Items Deleted successfully");
				return Redirect::to('academic/amw/')->with('title', 'All Courses Item List');
			}
		}
		catch
		(exception $ex){
			return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

		}
	}

	public function amw_batchdelete()
	{
		try {
            AcmMarksDistItem::destroy(Request::get('id'));
			Session::flash('danger', "Items Deleted successfully");
			return Redirect::to('academic/amw/')->with('title', 'All Courses Item List');
		}
		catch
		(exception $ex){
			return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

		}
	}

	public function destroy($id)
	{
		//
	}
	//End code

//****************Start amw course config code****************

	public function config_index()
	{
		$course_data= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment','relCourseType')
			->get();
		return View::make('academic::amw.mark_distribution_courses.index_course_config')->with('title', 'CourseManagement List to Course Config')->with('datas', $course_data);
	}

	public function find_course_info($course_id)
	{
		$data= CourseManagement::with('relCourseType', 'relCourse')
			->where('course_id', '=', $course_id)
			->first();

		//first() means one array return and get() means object return

		//To edit and update retrived data from Database
		$course_data = DB::table('acm_course_config')
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
		return View::make('academic::amw.mark_distribution_courses.show_course_to_insert')->with('datas', $data)->with('course_data', $course_data);

	}
	public function save_acm_course_config_data()
	{
		$data = Input::all();

		$isDefault = Input::get('isDefault');
		// $course_management_id = Input::get('course_management_id');
		$course_type_id = Input::get('course_type_id');
		$isAttendance = Input::get('isAttendance');
		$isReadOnly = Input::get('isReadOnly');
		$acm_config_id = Input::get('acm_config_id');
		$acm_item_id = Input::get('acm_marks_dist_item_id');
		$count = count($acm_item_id);
		for($i=0; $i < $count; $i++) {
			//$model1 = $data['acm_config_id'][$i] ? AcmCourseConfig::find($acm_config_id[$i]) : new AcmCourseConfig;
			$model1 = ($acm_config_id[$i]) ? AcmCourseConfig::find($acm_config_id[$i]) : new AcmCourseConfig;

			if($acm_config_id[$i])
				$model1->updated_by = Auth::user()->get()->role_id;
			else
				$model1->created_by =Auth::user()->get()->id;

			$model1->acm_marks_dist_item_id = $acm_item_id[$i];
			$model1->course_id = $data['course_id'][$i];
			$model1->marks = $data['actual_marks'][$i];
			$model1->default_item = 0;
			if($isDefault){
				foreach($isDefault as $isd){
					if($isd == $i)
						$model1->default_item = 1;
				}
			}
			$model1->is_attendance = 0;
			if($isAttendance) {
				foreach ($isAttendance as $isa) {
					if ($isa == $i) {
						$model1->is_attendance = 1;
						$check_data = AcmAttendanceConfig::where('course_type_id', '=', $course_type_id)->first();
						if(count($check_data) > 0)
						{
							$acm_config = AcmAttendanceConfig::find($check_data->id);
							$acm_config->course_type_id = $course_type_id;
							// $acm_config->course_management_id = $course_management_id;
							$acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
							$acm_config->save();
						}
						else
						{
							$acm_config = new AcmAttendanceConfig;
							$acm_config->course_type_id = $course_type_id;
							// $acm_config->course_management_id = $course_management_id;
							$acm_config->acm_marks_dist_item_id = $acm_item_id[$i];
							$acm_config->save();
						}
					}
				}
			}
			$model1->readonly = 0;
			if($isReadOnly){
				foreach($isReadOnly as $isr){
					if($isr == $i)
						$model1->readonly = 1;
				}
			}
			$model1->save();
		}

		// redirect
		Session::flash('message', 'ACM Course Configuration Data Successfully Added !!');
		return Redirect::to('academic/amw/config/');
	}
	//Ajax delete in modal
	public function ajax_delete_acm_course_config()
	{
		if(Request::ajax())
		{
			$course_config_id = Input::get('acm_course_config_id');

			$data = AcmCourseConfig::find($course_config_id);
			if($data->delete())
				return Response::json(['msg'=> 'Data Successfully Deleted']);
			else
				return Response::json(['msg'=> 'Data Successfully Not Deleted']);
		}
	}

	public function course_config_show($course_id)
	{
		$data= CourseManagement::with('relYear', 'relSemester', 'relCourse', 'relCourse.relSubject.relDepartment')
			->where('course_id', '=', $course_id)
			->get();
		$config_data= AcmCourseConfig::with('relAcmMarksDistItem', 'relCourse')
			->where('course_id', '=', $course_id)
			->get();
		return View::make('academic::amw.mark_distribution_courses.show_course_config')->with('datas', $data)->with('config_data',$config_data);
	}

	public function show_config($id)
	{
		$data= AcmCourseConfig::with('relAcmMarksDistItem', 'relCourse')
			->where('course_id', '=', $id)
			//->where('is_attendance', '=', 1)
			->get();

		return View::make('academic::amw.mark_distribution_courses.show_marks_dist_item')->with('datas', $data);
	}

//End code

}
