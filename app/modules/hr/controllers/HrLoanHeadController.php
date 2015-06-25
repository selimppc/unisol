<?php

class HrLoanHeadController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {

        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function index_hr_loan_head()
    {
        $pageTitle = 'Loan Head Lists';


        return View::make('hr::hr.loan_head.index', compact('model','pageTitle'));
    }

    public function store_hr_loan_head()
    {

    }

    public function show_hr_loan_head()
    {
        return View::make('hr::hr.loan_head.view', compact('model'));
    }

    public function edit_hr_loan_head()
    {
        return View::make('hr::hr.loan_head.edit', compact('model'));
    }

    public function destroy_hr_loan_head()
    {

    }

    public function batch_delete_hr_loan_head()
    {

    }
}
