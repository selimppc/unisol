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
        $model = new ExmCenter();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->title = Input::get('title');
                $model->description = Input::get('description');
                $model->capacity = Input::get('capacity');
                $model->status = 'Free';
                $model->save();

                DB::commit();
                Session::flash('message', "$name Exam Center  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Exam Center not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
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
        $data = Input::all();
        $model = ExmCenter::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Exam Center Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Exam Center not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
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
