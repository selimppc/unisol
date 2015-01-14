<?php

class MarkdistributionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
//-------------------------------------
//Start amw dist item code
//-------------------------------------

	public function amw_index()
	{
        $data = AcmMarksDist::orderBy('id', 'ASC')->paginate(5);
        return View::make('academic::mark_distribution_courses.amw.index')->with('datas', $data)->with('title','All Course Item List');
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
        if ($datas->validate($data))
        {

            $datas->title = Input::get('title');
            $datas->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/index');
        }
        else
        {
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
	 * @param  int  $id
	 * @return Response
	 */
	public function amw_show()
	{

    }
    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function amw_edit($id)
	{
        $data = AcmMarksDist::find($id);
        return View::make('academic::mark_distribution_courses.amw.edit')->with('editamw',$data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function amw_update($id)
	{
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $datas = new AcmMarksDist();
        // attempt validation
        if ($datas->validate2($data))
        {
            // success code
            $datas = AcmMarksDist::find($id);

            $datas->title = Input::get('title');
            $datas->save();

            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/index');
        }
        else
        {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);

            return Redirect::to('amw/index');
        }
	}
    public function show_one($id)
    {
        $data = AcmMarksDist::find($id);
        return View::make('academic::mark_distribution_courses.amw.show')->with('datas',$data);
    }

    public function amw_delete($id)
    {
        $data= AcmMarksDist::find($id);
        if($data->delete())
        {

            Session::flash('danger', "Items Deleted successfully");
            return Redirect::to('amw/index')->with('title','All Courses Item List');
        }
    }
    public function amw_batchdelete()
    {
        Session::flash('danger', "Years Deleted successfully");
        AcmMarksDist::destroy(Request::get('id'));
        return Redirect::to('amw/index')->with('title','All Courses Item List');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
 //End code


//-------------------------------------
//Start amw course config code
//-------------------------------------
   public function config_index()
   {
    //return View::make('academic::mark_distribution_courses.amw.index_course_config')->with('title','All Course config List');

       $data = AcmCourseConfig::orderBy('id', 'ASC')->paginate(5);
       return View::make('academic::mark_distribution_courses.amw.index_course_config')->with('datas', $data)->with('title','All Course config List');
    }

    public function config_save()
    {
        $data = Input::all();

        // create a new model instance
        $datas = new AcmCourseConfig();

        // attempt validation
        if ($datas->validate($data))
        {

            $datas->acm_marks_dist_item_id = Input::get('acm_marks_dist_item_id');
            $datas->marks = Input::get('marks');
            $datas->readonly = Input::get('readonly');
            $datas->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/config/index');
        }
        else
        {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);

            return Redirect::to('amw/config/index');
        }
    }
    public  function config_edit($id)
    {
        $data = AcmCourseConfig::find($id);
        return View::make('academic::mark_distribution_courses.amw.edit_course_config')->with('editconfig',$data);
    }

    public function config_update($id)
    {
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $datas = new AcmCourseConfig();
        // attempt validation
        if ($datas->validate2($data))
        {
            $datas = AcmCourseConfig::find($id);
            // success code
            $datas->acm_marks_dist_item_id = Input::get('acm_marks_dist_item_id');
            $datas->marks = Input::get('marks');
            $datas->readonly = Input::get('readonly');
            $datas->save();
            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('amw/config/index');
        }
        else
        {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);

            return Redirect::to('amw/config/index');
        }
    }
    public  function config_show_one($id)
    {
        $data = AcmCourseConfig::find($id);
        return View::make('academic::mark_distribution_courses.amw.show_course_config')->with('datas',$data);
    }

    public function config_delete($id)
    {
        $data= AcmCourseConfig::find($id);
        if($data->delete())
        {

            Session::flash('danger', "Items Deleted successfully");
            return Redirect::to('amw/config/index')->with('title','All Course config List');
        }
    }

    public function config_batchdelete()
    {
        Session::flash('danger', "Course Item Deleted successfully");
        AcmCourseConfig::destroy(Request::get('id'));
        return Redirect::to('amw/config/index')->with('title','All Course config List');
    }









//End code




}
