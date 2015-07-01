<?php

class HrAllListController extends \BaseController {


    public function index_all_bonus()
    {
        $model = HrBonus::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrBonus::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->first();

        return View::make('hr::hr.all_list.all_bonus.index', compact('model','emp_name'));
    }

    public function index_all_over_time()
    {
        $model = HrOverTime::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrEmployee::with('relUser','relUser.relUserProfile')->first();

        return View::make('hr::hr.all_list.all_over_time.index', compact('model','emp_name'));
    }

    public function index_all_salary_advance()
    {
        $model = HrSalaryAdvance::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrSalaryAdvance::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->first();

        return View::make('hr::hr.all_list.all_salary_advance.index', compact('model','selected_employee_id','emp_name'));
    }

    public function index_all_salary()
    {
        $model = HrSalary::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrBonus::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->first();

        $lists_currency = array('' => 'Select Currency ') + Currency::lists('title','id');

        return View::make('hr::hr.all_list.all_salary.index',
            compact('model','selected_employee_id','lists_currency','emp_name'));
    }

    public function index_all_loan_head()
    {
        $pageTitle = 'Loan Head Lists';
        $model = HrLoanHead::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();

        $emp_name = HrEmployee::with('relUser','relUser.relUserProfile')->first();

        return View::make('hr::hr.all_list.all_loan_head.index', compact('model','pageTitle','selected_employee_id','emp_name'));
    }

    public function index_all_salary_transaction()
    {
        $model = HrSalaryTransaction::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
           ->get();

        $emp_name = HrSalaryTransaction::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
           ->first();

        $year_list = array(''=>'Select Year') + Year::lists('title','id');

        return View::make('hr::hr.all_list.all_salary_transaction.index', compact('model','year_list','emp_name'));
    }



}
