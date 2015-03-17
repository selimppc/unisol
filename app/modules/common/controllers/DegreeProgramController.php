<?php

class DegreeProgramController extends \BaseController {

    public function degreeProgramIndex()
    {

        $model = DegreeProgram::orderBy('id', 'DESC')->paginate(4);
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

        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
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

        if($model->validate($data)){
            if($model->save()){
                Session::flash('message','Successfully Updated Information!');
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
        DegreeProgram::find($id)->delete();

        return Redirect::back()->with('message', 'Successfully deleted Information!');
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
