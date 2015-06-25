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

    }

    public function store_hr_salary_transaction()
    {

    }

    public function show_hr_salary_transaction()
    {

    }

    public function edit_hr_salary_transaction()
    {

    }

    public function destroy_hr_salary_transaction()
    {

    }

    public function batch_delete_hr_salary_transaction()
    {

    }
}
