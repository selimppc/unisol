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

    }

    public function store_hr_salary_transaction_detail()
    {


    }

    public function show_hr_salary_transaction_detail()
    {

    }

    public function edit_hr_salary_transaction_detail()
    {

    }

    public function destroy_hr_salary_transaction_detail()
    {

    }

    public function batch_delete_hr_salary_transaction_detail()
    {

    }
}
