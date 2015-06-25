<?php

class HrSalaryTransactionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_salary_transaction()
    {
        $pageTitle = 'Salary Transaction Lists';


        return View::make('hr::hr.salary_transaction.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_transaction()
    {

    }

    public function show_hr_salary_transaction()
    {
        return View::make('hr::hr.salary_transaction.view', compact('model'));
    }

    public function edit_hr_salary_transaction()
    {
        return View::make('hr::hr.salary_transaction.edit', compact('model'));
    }

    public function destroy_hr_salary_transaction()
    {

    }

    public function batch_delete_hr_salary_transaction()
    {

    }
}
