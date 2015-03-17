<?php

class ExamCenterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function exmCenterIndex()
	{
        $model = ExmCenter::orderBy('id', 'DESC')->paginate(10);
        return View::make('common::exm_center.index',
                  compact('model'));
	}


	public function  exmCenterCreate()
	{
        return View::make('common::exm_center._form');
	}

	public function exmCenterStore()
	{
        $data = Input::all();
        if (ExmCenter::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
        }

	}

	public function exmCenterShow($id)
	{
        $model = ExmCenter::find($id);
        return View::make('common::exm_center.show',compact('model'));
	}

	public function exmCenterEdit($id)
	{
        $model = ExmCenter::find($id);
        return View::make('common::exm_center.edit',compact('model'));
	}

	public function exmCenterUpdate($id)
	{
        $model = ExmCenter::find($id);
        $data = Input::all();

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
	}

	public function exmCenterDelete($id)
	{
        ExmCenter::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }

    public function exmCenterBatchDelete()
    {
        ExmCenter::destroy(Request::get('ids'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }

}
