<?php

class HrSalaryDeductionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_deduction($loan_head_id , $employee_id)
    {
        $model = HrSalaryDeduction::with('relHrLoanHead','relHrLoanHead.relHrEmployee','relHrSalaryAdvance')
            ->where('hr_loan_head_id', $loan_head_id)->get();

        $salary_advance_list = array(''=>'Select Salary Advance') + HrSalaryAdvance::lists('title','id');

//        $loan_head_employee = HrLoanHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
//            ->where('id', $loan_head_id)
//            ->first();

        return View::make('hr::hr.salary_deduction.index',
            compact('model','loan_head_id','salary_advance_list','employee_id','employee','loan_head_id'));
    }

    public function store_hr_salary_deduction()
    {
        for($i = 0; $i < count(Input::get('hr_loan_head_id')) ; $i++){
            $dt[] = [
                'hr_loan_head_id' => Input::get('hr_loan_head_id')[$i],
                'hr_employee_id' => Input::get('hr_employee_id'),
                'hr_salary_advance_id' => Input::get('hr_salary_advance_id')[$i],
                'title'=> Input::get('title')[$i],
                'type'=> Input::get('type')[$i],
                'amount'=> Input::get('amount')[$i],
                'date'=> Input::get('date')[$i],
                'status'=> Input::get('status')[$i],
            ];
        }

        $model = new HrSalaryDeduction();
        DB::beginTransaction();
        try{
            foreach($dt as $values){
                $model->create($values);
            }

            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function ajax_delete_hr_salary_deduction()
    {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            HrSalaryDeduction::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
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