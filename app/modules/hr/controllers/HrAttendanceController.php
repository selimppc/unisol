<?php

class HrAttendanceController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
    {
        $model = new HrAttendance();
        if($this->isPostRequest()) {
            $hr_employee = Input::get('hr_employee');
            $id_no = Input::get('id_no');

            $data = $model->with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile');
            if (isset($hr_employee) && !empty($hr_employee)) $model->where('hr_attendance.hr_employee_id', '=', $hr_employee);
            if (isset($id_no) && !empty($id_no)) $model->where('hr_attendance.hr_employee_id', '=', $id_no);
            $data = $model->orderBy('id', 'DESC')->paginate(5);
        } else{
            $data = $model->with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->orderBy('id', 'DESC')->paginate(5);
        }

        //get all employee List
        $employee_list = User::GenuineEmployeeList();

        $emp_id = array('' => 'Select Employee ID') + HrEmployee::lists('employee_id', 'id');

        // old input data
        Input::flash();
        return View::make('hr::hr.hr_attendance.index',compact('data','employee_list','month','emp_id'));
    }


    public function test(){
        return View::make('hr::hr.hr_attendance.test');
    }

    public function storeAttendance()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
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
        $data = HrAttendance::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->find($id);

        return View::make('hr::hr.hr_attendance.show',compact('data'));
    }

    public function editAttendance($id){

        $model = HrAttendance::find($id);
        $employee_list = User::GenuineEmployeeList();
        $date = date('d-m-Y');
        return View::make('hr::hr.hr_attendance.edit',compact('model','employee_list','date'));
    }

    public function updateAttendance($id){

        $data = Input::all();
        $model = HrAttendance::find($id);

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
            $data = HrAttendance::find($id);
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
            HrAttendance::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
