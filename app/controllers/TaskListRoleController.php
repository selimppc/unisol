<?php

class TaskListRoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $task_list_role = TaskListRole::orderBy('id', 'DESC')->paginate(10);

        return View::make('target_list_role.index')->with('taskListRole',$task_list_role);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('target_list_role.create');
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
        $task_list_role = new TaskListRole();

        // attempt validation
        if ($task_list_role->validate($data))
        {

            $task_list_role->title = Input::get('title');
            $task_list_role->description = Input::get('description');

            $task_list_role->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('target_list_role');
        }
        else
        {
            // failure, get errors
            $errors = $task_list_role->errors();
            Session::flash('errors', $errors);

            return Redirect::to('target_list_role/create');
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
        $task_list_role = TaskListRole::find($id);

        if($task_list_role)
        {
            return View::make('target_list_role.show')->with('taskListRole',$task_list_role);
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
        $task_list_role = TaskListRole::find($id);

        // Show the edit employee form.
        return View::make('target_list_role.edit')->with('taskListRole',$task_list_role);
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
        $task_list_role = new TaskListRole();
        // attempt validation
        if ($task_list_role->validate2($data))
        {
            // success code
            $task_list_role = TaskListRole::find($id);

            $task_list_role->title = Input::get('title');
            $task_list_role->description = Input::get('description');

            $task_list_role->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('target_list_role');
        }
        else
        {
            // failure, get errors
            $errors = $task_list_role->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('target_list_role');
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

        $data= TaskListRole::find($id);
        if($data->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted Course type Information!');
        }
        //ok
    }

    public function batchDelete(){


        TaskListRole::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }

}
