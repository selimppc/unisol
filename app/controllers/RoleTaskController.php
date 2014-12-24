<?php

class RoleTaskController extends \BaseController {


    public function index()
    {
        //$role_task_list = DB::table('role_task')->get();
        $role_task_list = RoleTask::orderBy('id', 'DESC')->paginate(5);
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
            $roletask = new RoleTask;

            $roletask->target_role_id = Input::get('target_role_id');
            $roletask->task_list_id = Input::get('task_list_id');
            $roletask->title = Input::get('title');
            $roletask->description = Input::get('description');
            $roletask->status = Input::get('status');
            $roletask->save();
            // return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('roletask/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function show($id)
    {
        $roletask = RoleTask::find($id);

        return View::make('role_task.show',compact('roletask'));
    }


    public function edit($id)

    {
        $roletask = RoleTask::find($id);
        // Show the edit employee form.
        return View::make('role_task.edit', compact('roletask'));
    }


    public function update($id)
    {
        $rules = array(
            'title' => 'required',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $roletask = RoleTask::find($id);
            $roletask->title = Input::get('title');
            $roletask->target_role_id = Input::get('target_role_id');
            $roletask->task_list_id = Input::get('task_list_id');
            $roletask->status = Input::get('status');
            $roletask->description = Input::get('description');

            $roletask->save();

            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('roletask/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function destroy($id){

        RoleTask::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }





}
