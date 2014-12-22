<?php

class CourseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $course = Course::orderBy('id', 'DESC')->paginate(10);

        return View::make('course.index')->with('course_management',$course);
        //ok
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('course.create');
        //ok
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
        $course = new Course();

        // attempt validation
        if ($course->validate($data))
        {
            // success code
            $course->title = Input::get('title');

            $course->course_code = Input::get('course_code');

            $course->subject_id = Input::get('subject_id');

            $course->description = Input::get('description');

            $course->course_type = Input::get('course_type');

            $course->evaluation_total_marks = Input::get('evaluation_total_marks');

            $course->credit = Input::get('credit');

            $course->hours_per_credit = Input::get('hours_per_credit');

            $course->cost_per_credit = Input::get('cost_per_credit');

            $course->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('course');
        }
        else
        {
            // failure, get errors
            $errors = $course->errors();
            Session::flash('errors', $errors);

            return Redirect::to('course/create');
        }
        //ok
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $course = Course::find($id);

        if($course)
        {
            return View::make('course.show')->with('course_management',$course);
        }
        App::abort(404);
        //ok
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $course = Course::find($id);

        // Show the edit employee form.
        return View::make('course.edit')->with('course_management',$course);
        //ok
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
        $course = new Course();
        // attempt validation
        if ($course->validate2($data))
        {
            // success code
            $course = Course::find($id);

            $course->title = Input::get('title');

            $course->course_code = Input::get('course_code');

            $course->subject_id = Input::get('subject_id');

            $course->description = Input::get('description');

            $course->course_type = Input::get('course_type');

            $course->evaluation_total_marks = Input::get('evaluation_total_marks');

            $course->credit = Input::get('credit');

            $course->hours_per_credit = Input::get('hours_per_credit');

            $course->cost_per_credit = Input::get('cost_per_credit');


            $course->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('course');
        }
        else
        {
            // failure, get errors
            $errors = $course->errors();
            Session::flash('errors', $errors);

            return Redirect::to('course');
        }
        //ok
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        $data= Course::find($id);
        if($data->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted Course Information!');
        }
        //ok
    }

    public function batchDelete(){

        Course::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }


}
