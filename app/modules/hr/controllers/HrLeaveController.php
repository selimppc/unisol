<?php

class HrLeaveController extends \BaseController {

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
        $data = HrLeave::with('relHrLeaveType','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->orderBy('id', 'DESC')->paginate(5);
        $leave_type_id = HrLeaveType::lists('title','id');
        $employee_list = User::EmployeeList();

        return View::make('hr::hr.leave.index',compact('data','employee_list','leave_type_id'));
    }

    public function storeLeave()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrLeave();
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

    public function showLeave($id)
    {
        $model = HrLeave::with('relHrLeaveType','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->find($id);
        return View::make('hr::hr.leave.show',compact('model'));
    }

    public function editLeave($id){

        $model = HrLeave::find($id);
        $employee_list = User::EmployeeList();
        $leave_type_id = HrLeaveType::lists('title','id');
        return View::make('hr::hr.leave.edit',compact('model','employee_list','leave_type_id'));
    }

    public function updateLeave($id){

        $data = Input::all();
        $model = HrLeave::find($id);

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

    public function deleteLeave($id)
    {
        try {
            $data = HrLeave::find($id);
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
            HrLeave::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
