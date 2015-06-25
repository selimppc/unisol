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

    }

    public function store_hr_loan_head()
    {


    }

    public function show_hr_loan_head()
    {

    }

    public function edit_hr_loan_head()
    {

    }

    public function destroy_hr_loan_head()
    {

    }

    public function batch_delete_hr_loan_head()
    {

    }
}
