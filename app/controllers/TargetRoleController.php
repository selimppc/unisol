<?php

class TargetRoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $target_role = TargetRole::orderBy('id', 'DESC')->paginate(10);

        return View::make('target_role.index')->with('targetRole',$target_role);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('target_role.create');
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
        $target_role = new TargetRole();

        // attempt validation
        if ($target_role->validate($data))
        {
            // success code

            $target_role->code = Input::get('code');
            $target_role->title = Input::get('title');
            $target_role->description = Input::get('description');

            $target_role->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('target_role');
        }
        else
        {
            // failure, get errors
            $errors = $target_role->errors();
            Session::flash('errors', $errors);

            return Redirect::to('target_role/create');
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
        $target_role = TargetRole::find($id);

        if($target_role)
        {
            return View::make('target_role.show')->with('targetRole',$target_role);
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
        $target_role = TargetRole::find($id);

        // Show the edit employee form.
        return View::make('target_role.edit')->with('targetRole',$target_role);
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
        $target_role = new TargetRole();
        // attempt validation
        if ($target_role->validate2($data))
        {
            // success code
            $target_role = TargetRole::find($id);

            $target_role->code = Input::get('code');
            $target_role->title = Input::get('title');
            $target_role->description = Input::get('description');

            $target_role->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('target_role');
        }
        else
        {
            // failure, get errors
            $errors = $target_role->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('target_role');
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

        $data= TargetRole::find($id);
        if($data->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted Course type Information!');
        }
        //ok
    }

    public function batchDelete(){


        TargetRole::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }


}
