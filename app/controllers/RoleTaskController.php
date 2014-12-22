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
        $rules = array(
            'title' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $roletasks = new RoleTask;

            $roletasks->target_role_id = Input::get('target_role_id');
            $roletasks->task_list_id = Input::get('task_list_id');
            $roletasks->title = Input::get('title');
            $roletasks->description = Input::get('description');
            $roletasks->status = Input::get('status');
            $roletasks->save();
            // return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('roletask/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
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
