<?php

class SemesterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $semester = Semester::orderBy('id', 'DESC')->paginate(5);
        return View::make('common::semester.index')->with('term_semester',$semester);
        //ok
	}

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
            return Redirect::to('common/semester/');
        }
        else
        {
            // failure, get errors
            $errors = $semester->errors();
            Session::flash('errors', $errors);
            return Redirect::to('common/semester/');
        }
        //ok
	}

	public function show($id)
	{
        // get the employee
        $semester = Semester::find($id);
        if($semester)
        {
          return View::make('common::semester.show')->with('term_semester',$semester);
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
        return View::make('common::semester.edit')->with('term_semester',$semester);
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
            return Redirect::to('common/semester/');
        }
        else
        {
            // failure, get errors
            $errors = $semester->errors();
            Session::flash('errors', $errors);
            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('common/semester/');
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
        try {
            Semester::find($id)->delete();
            return Redirect::back()->with('danger', 'Semester Deleted successfully!');
        }
        catch(exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
 }
    public function batchDelete()
    {
        try{
        Semester::destroy(Request::get('id'));
        return Redirect::back()->with('danger', 'Semester Deleted successfully!');
        }
        catch (exception $ex)
        {
          return Redirect::back()->with('message', 'Invalid Delete Process ! Semester has been using in All courses Module.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

}
