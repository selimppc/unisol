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
        $model = new Semester();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Semester  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Semester not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
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
        $data = Input::all();
        $model = Semester::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Semester Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Semester not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
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
