<?php

class HrSalaryTransactionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_transaction($emp_id)
    {
        $pageTitle = 'Salary Transaction Lists';
        $model = HrSalaryTransaction::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('hr_employee_id', $emp_id)->get();

        $emp_name = HrSalaryTransaction::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('hr_employee_id', $emp_id)->first();

        $year_list = array(''=>'Select Year') + Year::lists('title','id');

        $selected_employee_id = $emp_id;

        return View::make('hr::hr.salary_transaction.index', compact('model','pageTitle','year_list','emp_name','selected_employee_id'));
    }

    public function store_hr_salary_transaction()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrSalaryTransaction();
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

    public function show_hr_salary_transaction($s_t_id)
    {
        $data = HrSalaryTransaction::findOrFail($s_t_id);
        return View::make('hr::hr.salary_transaction.view', compact('data'));
    }

    public function edit_hr_salary_transaction($s_t_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryTransaction::findOrFail($s_t_id);

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
            $model = HrSalaryTransaction::findOrFail($s_t_id);
            $selected_employee_id = HrSalaryTransaction::first()->hr_employee_id;
            $year_list = array(''=>'Select Year') + Year::lists('title','id');
            return View::make('hr::hr.salary_transaction.edit', compact('model','year_list','selected_employee_id','lists_currency'));
        }

    }

    public function destroy_hr_salary_transaction($s_t_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryTransaction::destroy($s_t_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_salary_transaction()
    {
        DB::beginTransaction();
        try{
            HrSalaryTransaction::destroy(Request::get('id'));
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
