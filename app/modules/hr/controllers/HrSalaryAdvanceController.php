<?php

class HrSalaryAdvanceController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_advance()
    {
        $pageTitle = 'Salary Advance Lists';


        return View::make('hr::hr.salary_advance.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_advance()
    {

    }

    public function show_hr_salary_advance()
    {
        return View::make('hr::hr.salary_advance.view', compact('model'));
    }

    public function edit_hr_salary_advance()
    {
        return View::make('hr::hr.salary_advance.edit', compact('model'));
    }

    public function destroy_hr_salary_advance()
    {

    }

    public function batch_delete_hr_salary_advance()
    {

    }
}