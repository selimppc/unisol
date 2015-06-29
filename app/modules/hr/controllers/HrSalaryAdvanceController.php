<?php

class HrSalaryAdvanceController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_advance($emp_id)
    {
        $pageTitle = 'Salary Advance Lists';
        $model = HrSalaryAdvance::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('hr_employee_id', $emp_id)->get();

        $emp_name = HrSalaryAdvance::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('hr_employee_id', $emp_id)->first();

        $selected_employee_id = $emp_id;

        return View::make('hr::hr.salary_advance.index', compact('model','pageTitle','selected_employee_id','emp_name'));
    }

    public function store_hr_salary_advance()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrSalaryAdvance();
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

    public function show_hr_salary_advance($bn_id)
    {
        $data = HrSalaryAdvance::findOrFail($bn_id);
        return View::make('hr::hr.salary_advance.view', compact('data'));
    }

    public function edit_hr_salary_advance($bn_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryAdvance::findOrFail($bn_id);
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
            $model = HrSalaryAdvance::findOrFail($bn_id);
            $selected_employee_id = HrSalaryAdvance::first()->hr_employee_id;
            return View::make('hr::hr.salary_advance.edit', compact('model','selected_employee_id','lists_currency'));
        }

    }

    public function destroy_hr_salary_advance($bn_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryAdvance::destroy($bn_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_salary_advance()
    {
        DB::beginTransaction();
        try{
            HrSalaryAdvance::destroy(Request::get('id'));
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
