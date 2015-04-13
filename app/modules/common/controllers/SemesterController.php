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
        $data = Input::all();
        $semester = new Semester();
        if ($semester->validate($data))
        {
            $semester->title = Input::get('title');
            $name = $semester->title;
            $semester->description = Input::get('description');
            $semester->save();
            Session::flash('message', "$name Semester Added");
            return Redirect::to('common/semester/');
        }
        else
        {
            // failure, get errors
            $errors = $semester->errors();
            Session::flash('errors', $errors);
            return Redirect::to('common/semester/');
        }

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
        $rules = array(
            'title' => 'required|Min: 3',
            'description' => 'required|Min: 3',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $semester = Semester::find($id);
            $semester->title = Input::get('title');
            $name = $semester->title;
            $semester->description = Input::get('description');
            $semester->save();
            Session::flash('message', "$name Semester Updated");
            return Redirect::to('common/semester/');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
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
            $data= Semester::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Semester Deleted");
                return Redirect::to('common/semester/');
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
 }
    public function batchDelete()
    {
        try{
        Semester::destroy(Request::get('id'));
        return Redirect::back()->with('message', 'Semester Deleted successfully!');
        }
        catch (exception $ex)
        {
          return Redirect::back()->with('message', 'Invalid Delete Process ! Semester has been using in All courses Module.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

}
