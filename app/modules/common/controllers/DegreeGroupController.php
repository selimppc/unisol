<?php

class DegreeGroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function degreeGroupIndex()
	{
        $model = DegreeGroup::orderBy('id', 'DESC')->paginate(10);
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

	public function degreeGroupDelete($id)
	{
        try {
            DegreeGroup::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
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
