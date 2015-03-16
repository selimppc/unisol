<?php

class DegreeGroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function degreeGroupIndex()
	{
        $model = DegreeGroup::orderBy('id', 'DESC')->paginate(3);
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
        if (DegreeGroup::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
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

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
	}

	public function degreeGroupDelete($id)
	{
        DegreeGroup::find($id)->delete();

        return Redirect::back()->with('message', 'Successfully deleted Information!');
	}
    public function degreeGroupBatchDelete()
    {
        DegreeGroup::destroy(Request::get('ids'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }


}
