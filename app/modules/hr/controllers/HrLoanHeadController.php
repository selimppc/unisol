<?php

class HrLoanHeadController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {

        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function index_hr_loan_head()
    {
        $model = HrLoanHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrEmployee::with('relUser','relUser.relUserProfile')->first();

        $employee_name_list = array(''=>'Select Employee') + User::EmployeeList();

        return View::make('hr::hr.loan_head.index',
            compact('model','pageTitle','selected_employee_id','emp_name','employee_name_list'));
    }

    public function store_hr_loan_head()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrLoanHead();
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

    public function show_hr_loan_head($lh_id)
    {
        $data = HrLoanHead::findOrFail($lh_id);
        return View::make('hr::hr.loan_head.view', compact('data'));
    }

    public function edit_hr_loan_head($lh_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrLoanHead::findOrFail($lh_id);
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
            $model = HrLoanHead::findOrFail($lh_id);
            $selected_employee_id = HrLoanHead::first()->hr_employee_id;
            $employee_name_list = array(''=>'Select Employee') + User::EmployeeList();
            return View::make('hr::hr.loan_head.edit', compact('model','selected_employee_id','lists_currency','$employee_name_list'));
        }        
    }

    public function destroy_hr_loan_head($lh_id)
    {
        DB::beginTransaction();
        try{
            HrLoanHead::destroy($lh_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_loan_head()
    {
        DB::beginTransaction();
        try{
            HrLoanHead::destroy(Request::get('id'));
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
