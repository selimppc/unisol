<?php

class HrSalaryController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_salary
    public function index_hr_salary()
    {
        $model = HrSalary::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrBonus::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->first();

        $employee_name_list = array(''=>'Select Employee') + User::EmployeeList();

        $lists_currency = array('' => 'Select Currency ') + Currency::lists('title','id');

        return View::make('hr::hr.salary.index',
            compact('model','selected_employee_id','lists_currency','emp_name','employee_name_list'));
    }

    public function store_hr_salary()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
           # print_r($input_data);exit;
            $model = new HrSalary();
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

    public function show_hr_salary($s_g_id)
    {
        $data = HrSalary::with('relHrEmployee','relHrEmployee.relCurrency','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->findOrFail($s_g_id);
        return View::make('hr::hr.salary.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary($s_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalary::findOrFail($s_id);
            if($model->validate($input_data)){
                DB::beginTransaction();
                try{
                    $model->update($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $model = HrSalary::findOrFail($s_id);
            $selected_employee_id = HrSalary::first()->hr_employee_id;
            $lists_currency = Currency::lists('title','id');
            $employee_name_list = array(''=>'Select Employee') + User::EmployeeList();
            return View::make('hr::hr.salary.edit', compact('model','selected_employee_id','lists_currency','employee_name_list'));
        }
    }

    public function destroy_hr_salary($s_g_id)
    {
        DB::beginTransaction();
        try{
            HrSalary::destroy($s_g_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_salary()
    {
        DB::beginTransaction();
        try{
            HrSalary::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }
}
