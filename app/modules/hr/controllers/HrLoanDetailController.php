<?php

class HrLoanDetailController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_loan_detail()
    {
        $pageTitle = 'Loan Detail Lists';

        return View::make('hr::hr.loan_detail.index', compact('model','pageTitle'));
    }

    public function store_hr_loan_detail()
    {

    }

    public function show_hr_loan_detail()
    {

        return View::make('hr::hr.loan_detail.view', compact('model'));
    }

    public function edit_hr_loan_detail()
    {
        return View::make('hr::hr.loan_detail.edit', compact('model'));
    }

    public function destroy_hr_loan_detail()
    {

    }

    public function batch_delete_hr_loan_detail()
    {

    }
}