<?php

class DegreeProgramController extends \BaseController {


    public function degreeProgramIndex()
    {
        $model = DegreeProgram::orderBy('id', 'DESC')->paginate(10);
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
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Degree Program  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Degree Program  not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
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
        $data = Input::all();
        $model = DegreeProgram::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Degree Program Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Degree Program not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
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
