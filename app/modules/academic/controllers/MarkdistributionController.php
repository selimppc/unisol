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
        $datas = Course::all();
        return View::make('academic::mark_distribution_courses.amw.index_course_config')->with('title', 'Course List')->with('datas', $datas);
    }

    public function find_course_info($id)
    {
        $data = Course::find($id);
        return View::make('academic::mark_distribution_courses.amw.show_course_to_insert')->with('datas', $data);
    }

    public function save_acm_course_config_data()
    {
        $data = Input::all();
        for ($idx = 0; $idx < count(Input::get('acm_marks_dist_item_id')); $idx++) {
            $values = new AcmCourseConfig;
            $values->acm_marks_dist_item_id = $data['acm_marks_dist_item_id'][$idx];
            $values->course_id = $data['course_id'][$idx];
            $values->marks = $data['actual_marks'][$idx];
            $values->readonly = (Input::has('isReadOnly') == 1) ? 1 : 0;
            $values->default_item = (Input::get('isDefault' . $idx) == 1) ? 1 : 0;
            // $values->readonly = $data['isReadOnly'][$idx];
            // $values->default_item = $data['isDefault'.$idx];
            $values->save();
        }
         // redirect
            Session::flash('message', 'ACM Course Configuration Data Successfully Added !!');
            return Redirect::to('amw/config/index');

    }

    public function config_show_one($id)
    {
//        $data = AcmCourseConfig::where('course_id', '=', $id);
        $data = AcmCourseConfig::where('course_id', '=', '1')->get();
        return View::make('academic::mark_distribution_courses.amw.show_course_config')->with('datas', $data);
    }
//End code


//**********************Start teacher code********************

    public function  teacher_index()
    {
        return View::make('academic::mark_distribution_courses.teacher.index')->with('title', 'All Marks Distribution list');
    }


//End code


}
