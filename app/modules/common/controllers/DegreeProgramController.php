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
        if (DegreeProgram::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
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

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
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
        DegreeProgram::destroy(Request::get('ids'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }
}
