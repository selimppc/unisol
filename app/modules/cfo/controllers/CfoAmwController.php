<?php

class CfoAmwController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


//CFO Onsite Help-Desk

    public function indexHelpDesk(){

        $data = CfoOnsiteHelpDesk::with('relDepartment','relUser','relCfoCategory')->latest('id')->paginate(10);
        return View::make('cfo::onsite_help_desk.index',compact('data'));
    }

    public function createHelpDesk(){

        $dept_id = Department::lists('title','id');
        $user_id = User::CfoList();
        $cfo_category_id = CfoCategory::lists('title','id');
        $count_token = CfoOnsiteHelpDesk::count();

        $token_number = sprintf('%08d',$count_token);
        //print $token_number;exit;
        return View::make('cfo::onsite_help_desk.create',compact('data','cfo_category_id','dept_id','user_id','token_number','count_token'));
    }
    public function storeHelpDesk(){

        $data = Input::all();

        //print_r($data);exit;

        $model = new CfoOnsiteHelpDesk();

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Successfully  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function showHelpDesk($id){

        $data = CfoOnsiteHelpDesk::with('relDepartment','relUser','relCfoCategory')->find($id);
        return View::make('cfo::onsite_help_desk.show',compact('data'));
    }

    public function editHelpDesk($id){

        $model = CfoOnsiteHelpDesk::find($id);
        $dept_id = Department::lists('title','id');
        $user_id = User::CfoList();
        $cfo_category_id = CfoCategory::lists('title','id');

        return View::make('cfo::onsite_help_desk.edit',compact('model','dept_id','user_id','cfo_category_id'));
    }

    public function updateHelpDesk($id){

        $data = Input::all();
        $model = CfoOnsiteHelpDesk::findOrFail($id);

        if($model->validate($data)) {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', " Successfully updated  ");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function deleteHelpDesk($id)
    {
        try {
            $data = CfoOnsiteHelpDesk::find($id);

            $name = $data->title;
            if ($data->delete()) {
                Session::flash('message', "$name  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function assignedUserIndex(){

    }

}
