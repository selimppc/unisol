<?php

class HrEmployeeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_employee
    public function index_hr_employee()
    {
        $pageTitle = 'HR Employee List';
        $model = HrEmployee::with('relUser','relHrBank','relHrSalaryGrade',
            'relDesignation','relDepartment','relCurrency')->get();

//        //Generate Employee List
//        $employee_user = HrEmployee::get();
//        foreach($employee_user as $values){
//            $user_ids [] = [ $values->user_id ];
//        }
//        $employee_name_list = UserProfile::select('user_id', DB::raw('CONCAT(first_name, " ", middle_name, " ", last_name) AS full_name'))
//            ->orderBy('first_name')
//            ->whereIn('user_id', $user_ids)
//            ->lists('full_name', 'user_id');


        return View::make('hr::hr.employee.index', compact('model','pageTitle'));
    }

    public function store_hr_employee()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrEmployee();
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

    public function show_hr_employee($emp_id)
    {
        $data = HrEmployee::findOrFail($emp_id);
        return View::make('hr::hr.employee.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_employee($emp_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrEmployee::findOrFail($emp_id);
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
            $model = HrEmployee::findOrFail($emp_id);
            return View::make('hr::hr.employee.edit', compact('model'));
        }
    }

    public function destroy_hr_employee($emp_id)
    {
        DB::beginTransaction();
        try{
            HrEmployee::destroy($emp_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_employee()
    {
        DB::beginTransaction();
        try{
            HrEmployee::destroy(Request::get('id'));
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