<?php

class HrSalaryTransactionHeadController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_transaction()
    {
        $model = HrSalaryTransactionHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->orderBy('id', 'DESC')->get();

        $emp_name = HrSalaryTransactionHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->first();

        $employee_name_list = array(''=>'Select Employee') + User::GenuineEmployeeList();

        $year_list = array(''=>'Select Year') + Year::where('title', '>=' ,Date('Y') )->lists('title', 'id');

//        // Generate Salary Transaction Number
//        $salary_trn_no = HrTrnNoSetup::where('title', '=', "Salary Transaction Number")
//            ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
//            ->first()->number;
//
//        // Update Acc transaction Number
//        DB::table('hr_trn_no_setup')->where('title', '=', "Salary Transaction Number")
//            ->update(array('last_number' => substr($salary_trn_no, 4)));


        return View::make('hr::hr.salary_transaction.index',
            compact('model','year_list','emp_name','employee_name_list','salary_trn_no'));
    }

    public function store_hr_salary_transaction()
    {
        if($this->isPostRequest()){
            $salary_trn_no = HrTrnNoSetup::where('title', '=', "Salary Transaction Number")
                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
                ->first()->number;
            $input_data = Input::all();
            $inp_data = [
                'hr_employee_id' => $input_data['hr_employee_id'],
                'trn_number' => $salary_trn_no,
                'date' => $input_data['date'],
                'year_id' => $input_data['year_id'],
                'period' => $input_data['period'],
                'total_amount' => 0,
                'status'=> "open",
            ];
            $model = new HrSalaryTransactionHead();
            if($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
                    DB::table('hr_trn_no_setup')->where('title', '=', "Salary Transaction Number")
                        ->update(array('last_number' => substr($salary_trn_no,4)));
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            #$model = InvRequisitionHead::findOrFail($re_id);
            return Redirect::back();
        }
    }

    public function show_hr_salary_transaction($s_t_id)
    {
        $data = HrSalaryTransactionHead::findOrFail($s_t_id);
        return View::make('hr::hr.salary_transaction.view', compact('data'));
    }

    public function edit_hr_salary_transaction($s_t_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryTransactionHead::findOrFail($s_t_id);

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
            $model = HrSalaryTransactionHead::findOrFail($s_t_id);
            $selected_employee_id = HrSalaryTransactionHead::first()->hr_employee_id;
            $employee_name_list = array(''=>'Select Employee') + User::EmployeeList();
            $year_list = array(''=>'Select Year') + Year::lists('title','id');

            return View::make('hr::hr.salary_transaction.edit', compact('salary_trn_no','employee_name_list','model','year_list','selected_employee_id','lists_currency'));
        }

    }

    public function destroy_hr_salary_transaction($s_t_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryTransactionHead::destroy($s_t_id);
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
            HrSalaryTransactionHead::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function confirm_salary_transaction($st_id)
    {
        $input_data = Input::all();
            DB::beginTransaction();
                try{

                    $model = HrSalaryTransactionHead::findOrFail($st_id);
                    $model->status = "confirmed";
                    $model->update($input_data);

                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            return Redirect::back();
    }

    public function show_confirm_salary_transaction($s_t_id)
    {
        $data = HrSalaryTransactionHead::where('status', '!=','denied')->findOrFail($s_t_id);

        $model = HrSalaryTransactionDetail::with('relHrOverTime','relHrBonus','relHrSalaryAllowance','relHrSalaryDeduction')
            ->where('salary_trn_hd_id', $data->id)
            ->orderBy('id', 'DESC')
            ->get();

        return View::make('hr::hr.salary_transaction.view_confirmation', compact('data','model'));
    }





}
