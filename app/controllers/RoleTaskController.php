<?php

class RoleTaskController extends \BaseController {


    public function index()
    {
        $role_task_list = DB::table('role_task')->get();
        return View::make('role_task.index', compact('role_task_list'));

    }


	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}

    public function destroy($id){

        RoleTask::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }





}
