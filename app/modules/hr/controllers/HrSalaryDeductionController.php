<?php

class HrSalaryDeductionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_deduction($loan_head_id , $employee_id)
    {
        $model = HrSalaryDeduction::with('relHrLoanHead','relHrLoanHead.relHrEmployee','relHrSalaryAdvance')
            ->where('hr_loan_head_id', $loan_head_id)->get();
        #print_r($model);exit;

        $salary_advance_list = array(''=>'Select any one') + HrSalaryAdvance::lists('title','id');
        #print_r($salary_advance_list);exit;

        $loan_head_employee = HrLoanHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('id', $loan_head_id)
            ->first();

//        $employee = $loan_head_employee->relHrEmployee->relUser->relUserProfile->first_name.' '.
//                    $loan_head_employee->relHrEmployee->relUser->relUserProfile->middle_name.' '.
//                    $loan_head_employee->relHrEmployee->relUser->relUserProfile->last_name;

        #print_r($employee_name);exit;

        return View::make('hr::hr.salary_deduction.index',
            compact('model','pageTitle','loan_head_id','salary_advance_list','employee_id','employee'));
    }

    public function store_hr_salary_deduction()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrSalaryDeduction();
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

    public function show_hr_salary_deduction($s_d_id)
    {
        $data = HrSalaryDeduction::with('relHrLoanHead','relHrLoanHead.relHrEmployee','relHrSalaryAdvance')
            ->findOrFail($s_d_id);
        return View::make('hr::hr.salary_deduction.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary_deduction($s_d_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryDeduction::findOrFail($s_d_id);
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
            $model = HrSalaryDeduction::findOrFail($s_d_id);
            //$s_id = HrSalaryDeduction::where('id',$s_d_id)->first()->hr_salary_id;
            $loan_head_id = HrSalaryDeduction::where('id',$s_d_id)->first()->hr_loan_head_id;
            $employee_id = HrSalaryDeduction::where('id',$s_d_id)->first()->hr_employee_id;
            $salary_advance_list = array(''=>'Select any one') + HrSalaryAdvance::lists('title','id');
            #print_r($s_id);exit;
            return View::make('hr::hr.salary_deduction.edit',
                compact('model','deduction_list','s_id','loan_head_id','employee_id','salary_advance_list'));
        }
    }

    public function destroy_hr_salary_deduction($s_d_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryDeduction::destroy($s_d_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_salary_deduction()
    {
        DB::beginTransaction();
        try{
            HrSalaryDeduction::destroy(Request::get('id'));
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
