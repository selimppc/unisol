<?php

class CourseTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $course_type = CourseType::orderBy('id', 'DESC')->paginate(10);

        return View::make('course_type.index')->with('type_of_course',$course_type);
        //ok
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('course_type.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::all();

        // create a new model instance
        $course_type = new CourseType();

        // attempt validation
        if ($course_type->validate($data))
        {
            // success code
            $course_type->title = Input::get('title');
            $course_type->description = Input::get('description');

            $course_type->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('course_type');
        }
        else
        {
            // failure, get errors
            $errors = $course_type->errors();
            Session::flash('errors', $errors);

            return Redirect::to('course_type/create');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $course_type = CourseType::find($id);

        if($course_type)
        {
            return View::make('course_type.show')->with('type_of_course',$course_type);
        }
        App::abort(404);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $course_type = CourseType::find($id);

        // Show the edit employee form.
        return View::make('course_type.edit')->with('type_of_course',$course_type);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $course_type = new CourseType();
        // attempt validation
        if ($course_type->validate2($data))
        {
            // success code
            $course_type = CourseType::find($id);

            $course_type->title = Input::get('title');
            $course_type->description = Input::get('description');
            $course_type->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('course_type');
        }
        else
        {
            // failure, get errors
            $errors = $course_type->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('course_type');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        try {
            CourseType::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
	}

    public function batchDelete(){

        CourseType::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }


}
