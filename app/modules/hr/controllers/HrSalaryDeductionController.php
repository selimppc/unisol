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

    public function index_hr_salary_deduction()
    {
        $pageTitle = 'Salary Deduction Lists';


        return View::make('hr::hr.salary_deduction.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_deduction()
    {

    }

    public function show_hr_salary_deduction()
    {
        return View::make('hr::hr.salary_deduction.view', compact('model'));
    }

    public function edit_hr_salary_deduction()
    {
        return View::make('hr::hr.salary_deduction.edit', compact('model'));

    }

    public function destroy_hr_salary_deduction()
    {

    }

    public function batch_delete_hr_salary_deduction()
    {

    }
}
