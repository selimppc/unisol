<?php

class HrSalaryTransactionDetailController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function index_hr_salary_transaction_detail()
    {
        $pageTitle = 'Salary Transaction Detail Lists';


        return View::make('hr::hr.salary_transaction_detail.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_transaction_detail()
    {


    }

    public function show_hr_salary_transaction_detail()
    {
        return View::make('hr::hr.salary_transaction_detail.view', compact('model'));
    }

    public function edit_hr_salary_transaction_detail()
    {
        return View::make('hr::hr.salary_transaction_detail.edit', compact('model'));
    }

    public function destroy_hr_salary_transaction_detail()
    {

    }

    public function batch_delete_hr_salary_transaction_detail()
    {

    }
}
