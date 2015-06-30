<?php

class HrSalaryTransactionDetailController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
   /*
    * Todo : Over Time ta kivabe Handle korbo bujhtecina
   */
    public function index_hr_salary_transaction_detail($s_t_id)
    {
        #print_r($loan_head_id);exit;

        $pageTitle = 'Salary Transaction Detail Lists';
        $model = HrSalaryTransactionDetail::with('relHrOverTime','relHrBonus','relHrSalaryAllowance','relHrSalaryDeduction')
            ->where('hr_salary_transaction_id', $s_t_id)->get();
        #print_r($model);exit;

        $salary_allowance_list = array(''=>'Select any one') + HrSalaryAllowance::lists('title','id');
        $salary_deduction_list = array(''=>'Select any one') + HrSalaryDeduction::lists('title','id');
        $over_time_list = array(''=>'Select any one') + HrOverTime::lists('sign_in','id');
        $bonus_list = array(''=>'Select any one') + HrBonus::lists('title','id');
        #print_r($salary_allowance_list);exit;

        return View::make('hr::hr.salary_transaction_detail.index', compact('model','pageTitle','loan_head_id',
            'salary_allowance_list','salary_deduction_list','over_time_list','bonus_list','s_t_id'));
    }

    public function store_hr_salary_transaction_detail()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrSalaryTransactionDetail();
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

    public function show_hr_salary_transaction_detail($s_t_d_id)
    {
        $data = HrSalaryTransactionDetail::with('relHrSalaryTransaction','relHrOverTime','relHrBonus','relHrSalaryAllowance','relHrSalaryDeduction')
            ->findOrFail($s_t_d_id);
        return View::make('hr::hr.salary_transaction_detail.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary_transaction_detail($s_t_d_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryTransactionDetail::findOrFail($s_t_d_id);
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
            $model = HrSalaryTransactionDetail::findOrFail($s_t_d_id);
            //$s_id = HrSalaryTransactionDetail::where('id',$s_d_id)->first()->hr_salary_id;

            $s_t_id = HrSalaryTransactionDetail::where('id',$s_t_d_id)->first()->hr_salary_transaction_id;
           # print_r($s_t_id);exit;

            $salary_allowance_list = array(''=>'Select any one') + HrSalaryAllowance::lists('title','id');
            $salary_deduction_list = array(''=>'Select any one') + HrSalaryDeduction::lists('title','id');
            $over_time_list = array(''=>'Select any one') + HrOverTime::lists('sign_in','id');
            $bonus_list = array(''=>'Select any one') + HrBonus::lists('title','id');

            return View::make('hr::hr.salary_transaction_detail.edit',
                compact('model','salary_allowance_list','salary_deduction_list','over_time_list','bonus_list','s_t_id'));
        }
    }

    public function destroy_hr_salary_transaction_detail($s_t_d_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryTransactionDetail::destroy($s_t_d_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_salary_transaction_detail()
    {
        DB::beginTransaction();
        try{
            HrSalaryTransactionDetail::destroy(Request::get('id'));
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
