<?php

class HrLeaveTypeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
    {
        $data = HrLeaveType::orderBy('id', 'DESC')->paginate(5);

        return View::make('hr::hr.leave_type.index',compact('data'));
    }

    public function storeLeaveType()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrLeaveType();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
    }

    public function showLeaveType($id)
    {
        $model = HrLeaveType::find($id);
        return View::make('hr::hr.leave_type.show',compact('model'));
    }

    public function editLeaveType($id){

        $model = HrLeaveType::find($id);
        return View::make('hr::hr.leave_type.edit',compact('model'));
    }

    public function updateLeaveType($id){

        $data = Input::all();
        $model = HrLeaveType::find($id);

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteLeaveType($id)
    {
        try {
            $data = HrLeaveType::find($id);
            if ($data->delete()) {
                Session::flash('message', "Successfully  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDelete()
    {
        try {
            HrLeaveType::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
