<?php

class DegreeProgramController extends \BaseController {


    public function degreeProgramIndex()
    {
        $model = DegreeProgram::orderBy('id', 'DESC')->paginate(5);
        return View::make('common::degree_program.index', compact('model'));
    }

    public function degreeProgramCreate()
    {
        return View::make('common::degree_program._form');
    }

    public function degreeProgramStore()
    {
        $data = Input::all();
        $model = new DegreeProgram();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', "$name Degree Program Added");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

	public function degreeProgramShow($id)
	{
        $model = DegreeProgram::find($id);
        return View::make('common::degree_program.show',compact('model'));
	}

	public function degreeProgramEdit($id)
	{
        $model = DegreeProgram::find($id);
        return View::make('common::degree_program.edit',compact('model'));
	}

	public function degreeProgramUpdate($id)
	{
        $model = DegreeProgram::find($id);
        $data = Input::all();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', "$name Degree Program Updated");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
	}

    public function degreeProgramDelete($id)
    {
        try {
            $data= DegreeProgram::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Degree Program Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function degreeProgramBatchDelete()
    {
        try {
            DegreeProgram::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
