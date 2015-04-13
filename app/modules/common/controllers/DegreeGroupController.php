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
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', "$name Degree Group Added");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
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
        $model = DegreeGroup::find($id);
        $data = Input::all();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', "$name Degree Group Updated");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
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
