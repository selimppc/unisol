<?php

class HrSalaryController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_salary
    public function index_hr_salary($emp_id)
    {
        $pageTitle = 'Salary List';
        $model = HrSalary::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
            ->where('hr_employee_id', $emp_id)->get();
        $employee_user = HrEmployee::get();
        foreach($employee_user as $values){
            $user_ids [] = [ $values->user_id ];
        }
        $lists = User::with('relUserProfile')->whereIn('id', $user_ids)->get();
        #print_r($lists);exit;

//        $list_w = User::with('relUserProfile')->whereIn('id', $user_ids)->first()->lists('first_name','id')
//        ->select(DB::raw('CONCAT(user_profile.first_name, " ", user_profile.middle_name, " ", user_profile.last_name ) as full_name'), 'user.id as user_id')->lists('full_name', 'user_id');
//
//        print_r($list_w);exit;

        return View::make('hr::hr.salary.index', compact('model','pageTitle','lists'));
    }

    public function store_hr_salary()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            print_r($input_data);exit;
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
        $data = HrSalary::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->findOrFail($s_g_id);
        return View::make('hr::hr.salary.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary($s_g_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalary::findOrFail($s_g_id);
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
            $model = HrSalary::findOrFail($s_g_id);
            return View::make('hr::hr.salary.edit', compact('model'));
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
