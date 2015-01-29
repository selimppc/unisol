<?php

class MarkdistributionController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

//*****************Start amw dist item code***********************


    public function amw_index()
    {
        $data = AcmMarksDist::orderBy('id', 'ASC')->paginate(5);
        return View::make('academic::mark_distribution_courses.amw.index')->with('datas', $data)->with('title', 'All Course Item List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function amw_save()
    {
        $data = Input::all();
        // create a new model instance
        $datas = new AcmMarksDist();
        // attempt validation
        if ($datas->validate($data)) {
            $datas->title = Input::get('title');
            $datas->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/index');
        } else {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);
            return Redirect::to('amw/index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function amw_show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function amw_edit($id)
    {
        $data = AcmMarksDist::find($id);
        return View::make('academic::mark_distribution_courses.amw.edit')->with('editamw', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function amw_update($id)
    {
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $datas = new AcmMarksDist();
        // attempt validation
        if ($datas->validate2($data)) {
            // success code
            $datas = AcmMarksDist::find($id);
            $datas->title = Input::get('title');
            $datas->save();
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/index');
        } else {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);
            return Redirect::to('amw/index');
        }
    }

    public function show_one($id)
    {
        $data = AcmMarksDist::find($id);
        return View::make('academic::mark_distribution_courses.amw.show')->with('datas', $data);
    }

    public function amw_delete($id)
    {
        $data = AcmMarksDist::find($id);
        if ($data->delete()) {
            Session::flash('danger', "Items Deleted successfully");
            return Redirect::to('amw/index')->with('title', 'All Courses Item List');
        }
    }

    public function amw_batchdelete()
    {
        Session::flash('danger', " Deleted successfully");
        AcmMarksDist::destroy(Request::get('id'));
        return Redirect::to('amw/index')->with('title', 'All Courses Item List');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    //End code


//****************Start amw course config code****************

    public function config_index()
    {
        $datas = DB::table('course_management')
            ->select(
                'course_management.id', 'course_management.course_id as course_id','course_management.year_id as year_id',
                'course_management.semester_id as semester_id',
                //'course.title as c_title',
                'course.evaluation_total_marks as evaluation_total_marks',
                'course.subject_id as c_s_id',
                'subject.department_id as s_d_id',
                'department.title as d_title'
            )
            ->join('course', 'course_management.course_id', '=', 'course.id' )
            ->join('subject', 'course.subject_id', '=', 'subject.id' )
            ->join('department', 'subject.department_id', '=', 'department.id' )
            //->where('course_management.id', 1)
            ->get();

        return View::make('academic::mark_distribution_courses.amw.index_course_config')->with('title', 'Course List')->with('datas', $datas);
    }

    public function find_course_info($course_id)
    {
//          $data = DB::table('course')
//            ->select(
//                'course.title as c_title',
//                'course.evaluation_total_marks',
//                'course.course_type',
//                'course_type.title as course_type_title'
//            )
//            ->join('course_type', 'course_type.id', '=', 'course.course_type' )
//            ->where('course.id', $course_id)
//            ->get();
//        //print_r($data);
//        //exit;
//       //$course_data = AcmCourseConfig::where('course_id','=',$course_id)->get();
//        return View::make('academic::mark_distribution_courses.amw.show_course_to_insert')
//            ->with('datas', $data);

        $data = DB::table('course')
            ->select(
                'course.title', 'course.evalution_total_marks', 'course.course_type', 'acm_course_config.*'
            )
            ->join('course_type', 'course_type.id', '=', 'course.course_type' )
            ->join('acm_course_config', 'acm_course_config.id', '=', $course_id )
            ->where('course.id', $course_id)
            ->get();
        // $course_data = AcmCourseConfig::where('course_id','=',$course_id)->get();
        return View::make('academic::mark_distribution_courses.amw.show_course_to_insert')->with('datas', $data);

    }
    public function save_acm_course_config_data()
    {
        $data = Input::all();

        $is_attendance = Input::get('is_attendance');
        $count = count(Input::get('acm_marks_dist_item_id'));

      //  if($is_attendance == 1){
           //     $model1 = new Model1();
             //   $model1->title = "data[]";
              //  $model1->save();
         //   }

          //  $model2 = new Model2();
          //  $model2->title = Input::get('is_attendance');
          //  $model2->save();

      //  }else{

            for($i=0; $i < $count; $i++){
                $model1 = new AcmCourseConfig();
                $model1->acm_marks_dist_item_id = $data['acm_marks_dist_item_id'][$i];
                $model1->course_id = $data['course_id'][$i];
                $model1->marks = $data['actual_marks'][$i];
                $model1->readonly = ($data['isReadOnly'][$i] == 1) ? "1" : "0";
                $model1->default_item = ($data['isDefault'][$i] == 1) ? "1" : "0";
                $model1->is_attendance = ($data['isAttendance'][$i] == 1) ? "1": "0";
                $model1->save();
            }
      //  }

//        print_r($data);
//        exit;

//        for ($idx = 0; $idx < count(Input::get('acm_marks_dist_item_id')); $idx++) {
//            //insert-a-new-record-if-not-exist-and-update-if-exist-laravel-eloquent
//            $values = ($data['acm_config_id'][$idx]) ? AcmCourseConfig::updateOrCreate(array('id' => $data['acm_config_id'][$idx])) : new AcmCourseConfig;
//            $values->acm_marks_dist_item_id = $data['acm_marks_dist_item_id'][$idx];
//            $values->course_id = $data['course_id'][$idx];
//            $values->marks = $data['actual_marks'][$idx];
////            $values->readonly = (Input::has('isReadOnly') == 1) ? 1 : 0;
////            $values->default_item = Input::get('isDefault' . $idx);
//            $values->readonly = ($data['isReadOnly'][$idx] == 1) ? "1" : "0";
//            $values->default_item = ($data['isDefault'][$idx] == 1) ? "1" : "0";
//            $values->is_attendance = ($data['isAttendance'][$idx] == 1) ? "1": "0";
//
//            $values->save();
//
//        }

        // redirect
        Session::flash('message', 'ACM Course Configuration Data Successfully Added !!');
        return Redirect::to('amw/config/index');

    }


//End code


//**********************Start teacher code********************

    public function  teacher_index()
    {
        $datas = DB::table('course_management')
            ->select(
                'course_management.id', 'course_management.course_id as course_id','course_management.year_id as year_id',
                'course_management.semester_id as semester_id',
                //'course.title as c_title',
                //'course.evaluation_total_marks as evaluation_total_marks',
                'course.subject_id as c_s_id',
                'subject.department_id as s_d_id',
                'department.title as d_title'
            )
            ->join('course', 'course_management.course_id', '=', 'course.id' )
            ->join('subject', 'course.subject_id', '=', 'subject.id' )
            ->join('department', 'subject.department_id', '=', 'department.id' )
            //->where('course_management.id', 1)
            ->get();

        return View::make('academic::mark_distribution_courses.teacher.index')->with('title', 'Course List')->with('datas', $datas);
    }


//End code


}
