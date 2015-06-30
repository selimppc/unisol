<?php

class HrSalaryAllowanceController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_allowance($s_id)
    {
        $pageTitle = 'Salary Allowance List';
        $model = HrSalaryAllowance::with('relHrSalary')->where('hr_salary_id', $s_id)->get();
        $allowance_list = HrAllowance::lists('title','id');
        #print_r($allowance_list);exit;

        return View::make('hr::hr.salary_allowance.index',compact('model','pageTitle','s_id','allowance_list'));
    }

    public function store_hr_salary_allowance()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            # print_r($input_data);exit;
            $model = new HrSalaryAllowance();
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

    public function show_hr_salary_allowance($s_a_id)
    {
        $data = HrSalaryAllowance::with('relHrSalary')->findOrFail($s_a_id);
        return View::make('hr::hr.salary_allowance.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary_allowance($s_a_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryAllowance::findOrFail($s_a_id);
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
            $model = HrSalaryAllowance::findOrFail($s_a_id);
            $allowance_list = HrAllowance::lists('title','id');
            $s_id = HrSalaryAllowance::where('id',$s_a_id)->first()->hr_salary_id;
            #print_r($s_id);exit;
            return View::make('hr::hr.salary_allowance.edit', compact('model','allowance_list','s_id'));
        }
    }

    public function destroy_hr_salary_allowance($s_a_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryAllowance::destroy($s_a_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_salary_allowance()
    {
        DB::beginTransaction();
        try{
            HrSalaryAllowance::destroy(Request::get('id'));
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
