<?php

class DegreeLevelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $degree_levels = DegreeLevel::orderBy('id', 'DESC')->paginate(10);

        return View::make('degree_level.index')->with('degree',$degree_levels);
    //ok
	}

	public function create()
    {
        return View::make('degree_level.create');
        //ok
    }

    public function store()
    {
        // get the POST data
        $data = Input::all();

        // create a new model instance
        $degree_levels = new DegreeLevel();

        // attempt validation
        if ($degree_levels->validate($data))
        {
            // success code
            $degree_levels->title = Input::get('title');
            $degree_levels->description = Input::get('description');

            $degree_levels->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('degree_level');
        }
        else
        {
            // failure, get errors
            $errors = $degree_levels->errors();
            Session::flash('errors', $errors);

            return Redirect::to('degree_level/create');
        }
        //ok

    }

    public function show($id)
    {
        // get the employee
        $degree_levels = DegreeLevel::find($id);

        if($degree_levels)
        {
            return View::make('degree_level.show')->with('degree',$degree_levels);
        }
        App::abort(404);
        //OK
    }


    public function edit($id)
    {
        $degree_levels = DegreeLevel::find($id);

        // Show the edit employee form.
        return View::make('degree_level.edit')->with('degree',$degree_levels);
    //ok
    }

	public function update($id)
	{
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $degree_levels = new DegreeLevel();
        // attempt validation
        if ($degree_levels->validate2($data))
        {
            // success code
            $degree_levels = DegreeLevel::find($id);

            $degree_levels->title = Input::get('title');
            $degree_levels->description = Input::get('description');
            $degree_levels->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('degree_level');
        }
        else
        {
            // failure, get errors
            $errors = $degree_levels->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('degree_level');
        }
    //ok
	}

  	public function destroy($id)
	{

        try {
            DegreeLevel::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
	}

    public function batchDelete(){

        DegreeLevel::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }


}
