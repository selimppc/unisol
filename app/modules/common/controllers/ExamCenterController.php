<?php

class ExamCenterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function exmCenterIndex()
	{
        $model = ExmCenter::orderBy('id', 'DESC')->paginate(5);
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
        $model = new ExmCenter();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', "$name Exam Center Added");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
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
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', "$name Exam Center Updated");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
	}

	public function exmCenterDelete($id)
	{
        try {
            $data= ExmCenter::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Exam Center Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }

    }

    public function exmCenterBatchDelete()
    {
        try {
            ExmCenter::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');

        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

}
