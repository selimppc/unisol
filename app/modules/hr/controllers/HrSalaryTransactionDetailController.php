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
        $model = HrSalaryTransactionDetail::with('relHrOverTime','relHrBonus','relHrSalaryAllowance','relHrSalaryDeduction')
            ->where('hr_salary_transaction_id', $s_t_id)
            ->get();

        $salary_allowance_list = array(''=>'Select any one') + HrSalaryAllowance::lists('title','id');
        $salary_deduction_list = array(''=>'Select any one') + HrSalaryDeduction::lists('title','id');
        $over_time_list = array(''=>'Select any one') + HrOverTime::lists('sign_in','id');
        $bonus_list = array(''=>'Select any one') + HrBonus::lists('title','id');

        return View::make('hr::hr.salary_transaction_detail.index', compact('model','pageTitle','loan_head_id',
            'salary_allowance_list','salary_deduction_list','over_time_list','bonus_list','s_t_id'));
    }

    public function store_hr_salary_transaction_detail()
    {
        for($i = 0; $i < count(Input::get('hr_salary_transaction_id')) ; $i++){
            $dt[] = [
                'hr_salary_transaction_id' => Input::get('hr_salary_transaction_id')[$i],
                'type'=> Input::get('type')[$i],
                'hr_salary_allowance_id'=> Input::get('hr_salary_allowance_id')[$i] ? Input::get('hr_salary_allowance_id')[$i] : NULL,
                'hr_salary_deduction_id'=> Input::get('hr_salary_deduction_id')[$i] ? Input::get('hr_salary_deduction_id')[$i] : NULL,
                'hr_over_time_id'=> Input::get('hr_over_time_id')[$i] ? Input::get('hr_over_time_id')[$i] : NULL,
                'hr_bonus_id'=> Input::get('hr_bonus_id')[$i] ? Input::get('hr_bonus_id')[$i] : NULL,
                'amount'=> Input::get('amount')[$i],
                'percentage'=> Input::get('percentage')[$i],
            ];
        }

        DB::beginTransaction();
        try{
            $model = new HrSalaryTransactionDetail();
            foreach($dt as $values){
                $model->create($values);
            }
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function ajax_delete_salary_trn_dtl()
    {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            HrSalaryTransactionDetail::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
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

            $s_t_id = HrSalaryTransactionDetail::where('id',$s_t_d_id)->first()->hr_salary_transaction_id;

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