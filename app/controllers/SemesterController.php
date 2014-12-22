<?php

class SemesterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $semester = Semester::orderBy('id', 'DESC')->paginate(10);

        return View::make('semester.index')->with('term_semester',$semester);
        //ok
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('semester.create');
        //ok
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // get the POST data
        $data = Input::all();

        // create a new model instance
        $semester = new Semester();

        // attempt validation
        if ($semester->validate($data))
        {
            // success code
            $semester->title = Input::get('title');
            $semester->description = Input::get('description');

            $semester->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('semester');
        }
        else
        {
            // failure, get errors
            $errors = $semester->errors();
            Session::flash('errors', $errors);

            return Redirect::to('semester/create');
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
        // get the employee
        $semester = Semester::find($id);

        if($semester)
        {
            return View::make('semester.show')->with('term_semester',$semester);
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
        $semester = Semester::find($id);

        // Show the edit employee form.
        return View::make('semester.edit')->with('term_semester',$semester);
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
        $semester = new Semester();
        // attempt validation
        if ($semester->validate2($data))
        {
            // success code
            $semester = Semester::find($id);

            $semester->title = Input::get('title');
            $semester->description = Input::get('description');
            $semester->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('semester');
        }
        else
        {
            // failure, get errors
            $errors = $semester->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('semester');
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

        $data= Semester::find($id);
        if($data->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted Course type Information!');
        }
        //ok
	}

    public function batchDelete(){


        Semester::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }


}
