<?php

class DegreeGroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function degreeGroupIndex()
	{
        $model = DegreeGroup::orderBy('id', 'DESC')->paginate(5);
        return View::make('common::degree_group.index',
            compact('model'));
	}

	public function degreeGroupCreate()
	{
        return View::make('common::degree_group._form');
	}

	public function degreeGroupStore()
	{
        $data = Input::all();
        $model = new DegreeGroup();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                    DB::commit();
                Session::flash('message', "$name Degree Group  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Degree Group  not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

	public function degreeGroupShow($id)
	{
        $model = DegreeGroup::find($id);
        return View::make('common::degree_group.show',compact('model'));
	}

	public function degreeGroupEdit($id)
	{
        $model = DegreeGroup::find($id);
        return View::make('common::degree_group.edit',compact('model'));
	}

	public function degreeGroupUpdate($id)
	{
        $data = Input::all();
        $model = DegreeGroup::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Degree Group Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Degree Group not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
	}

	public function degreeGroupDelete($id)
    {
        try {
            $data = DegreeGroup::find($id);
            $name = $data->title;
            if ($data->delete()) {
                Session::flash('message', "$name Degree Group Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function degreeGroupBatchDelete()
    {
        try {
            DegreeGroup::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }


}
