<?php

class HrEmployeeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_employee
    public function index_hr_employee()
    {
        $pageTitle = 'HR Employee List';
        $model = HrEmployee::with('relUser.relUserProfile','relHrBank','relHrSalaryGrade',
            'relDesignation','relDepartment','relCurrency')->orderBy('id', 'DESC')->get();

        $user_list = User::FullNameWithRoleNameList();
        $salary_grade = HrSalaryGrade::SalaryGradeLists();
        $depart = Department::GetDepartmentLists();
        $currency = Currency::CurrencyLists();
        $bank = HrBank::HrBankLists();
        $designation = Designation::GetDesignationLists();

        return View::make('hr::hr.employee.index', compact('user_list','model','pageTitle','salary_grade','depart','bank','currency','designation'));
    }

    public function store_hr_employee()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
//            print_r($input_data);exit;
            $model = new HrEmployee();
            $model->status = Input::get('status');
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
            $salary_grade = HrSalaryGrade::SalaryGradeLists();
            $depart = Department::GetDepartmentLists();
            $currency = Currency::CurrencyLists();
            $bank = HrBank::HrBankLists();
            $user_list = User::FullNameWithRoleNameList();
            $designation = Designation::GetDesignationLists();
            return View::make('hr::hr.employee.edit', compact('designation','user_list','model','salary_grade','depart','currency','bank'));
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