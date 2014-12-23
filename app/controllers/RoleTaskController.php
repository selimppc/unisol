<?php

class RoleTaskUserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $role_task = RoleTask::orderBy('id', 'DESC')->paginate(10);

        return View::make('role_task.index')->with('roleTask',$role_task);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('role_task.create');
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
        $role_task = new RoleTask();

        // attempt validation
        if ($role_task->validate($data))
        {

            $role_task->role_task_id = Input::get('role_task_id');
            $role_task->user_id = Input::get('user_id');
            $role_task->status = Input::get('status');

            $role_task->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('role_task');
        }
        else
        {
            // failure, get errors
            $errors = $role_task->errors();
            Session::flash('errors', $errors);

            return Redirect::to('role_task/create');
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
        $role_task = RoleTask::find($id);

        if($role_task)
        {
            return View::make('role_task.show')->with('roleTask',$role_task);
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
        $role_task = RoleTask::find($id);

        // Show the edit employee form.
        return View::make('role_task.edit')->with('roleTask',$role_task);
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
        $role_task = new RoleTask();
        // attempt validation
        if ($role_task->validate2($data))
        {
            // success code
            $role_task = RoleTaskUser::find($id);

            $role_task_user->role_task_id = Input::get('role_task_id');
            $role_task_user->user_id = Input::get('user_id');
            $role_task_user->status = Input::get('status');

            $role_task_user->save();

            // redirect
            Session::flash('message', 'Successfully Edited!');
            return Redirect::to('role_task_user');
        }
        else
        {
            // failure, get errors
            $errors = $role_task_user->errors();
            Session::flash('errors', $errors);

            //return Redirect::to('employee/create')->withInput()->withErrors($errors);
            return Redirect::to('role_task_user');
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

        $data= RoleTaskUser::find($id);
        if($data->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted!');
        }
        //ok
    }

    public function batchDelete(){


        RoleTaskUser::destroy(Request::get('id'));
        return Redirect::back();
        //ok
    }

}