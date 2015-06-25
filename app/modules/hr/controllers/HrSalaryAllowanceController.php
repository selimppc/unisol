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

    public function index_hr_salary_allowance()
    {
        $pageTitle = 'Salary Allowance Lists';


        return View::make('hr::hr.salary_allowance.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_allowance()
    {

    }

    public function show_hr_salary_allowance()
    {
        return View::make('hr::hr.salary_allowance.view', compact('model'));
    }

    public function edit_hr_salary_allowance()
    {
        return View::make('hr::hr.salary_allowance.edit', compact('model'));

    }

    public function destroy_hr_salary_allowance()
    {

    }

    public function batch_delete_hr_salary_allowance()
    {

    }
}