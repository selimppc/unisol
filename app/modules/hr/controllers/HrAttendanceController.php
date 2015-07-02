<?php

class HrAttendanceController extends \BaseController {

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
        $data = HrAttendance::get();
//        $employee_list = User::EmployeeList();
        return View::make('hr::hr.hr_attendance.index',compact('data','employee_list'));
    }

    public function storeAttendance()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrAttendance();
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

    public function showAttendance($id)
    {
        $data = HrProvidentFund::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->find($id);

        return View::make('hr::hr.hr_attendance.show',compact('data'));
    }

    public function editAttendance($id){

        $model = HrProvidentFund::find($id);
        $month = HrWorkWeek::getMonth();
        $employee_list = User::EmployeeList();
        return View::make('hr::hr.hr_attendance.edit',compact('model','month','employee_list'));
    }

    public function updateAttendance($id){

        $data = Input::all();
        $model = HrProvidentFund::find($id);

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

    public function deleteAttendance($id)
    {
        try {
            $data = HrProvidentFund::find($id);
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
            HrProvidentFund::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
