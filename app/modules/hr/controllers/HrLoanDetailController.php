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

    public function index_hr_loan_detail($emp_id)
    {

    }

    public function store_hr_loan_detail()
    {

    }

    public function show_hr_loan_detail($s_g_id)
    {

    }

    public function edit_hr_loan_detail($s_g_id)
    {

    }

    public function destroy_hr_loan_detail($s_g_id)
    {

    }

    public function batch_delete_hr_loan_detail()
    {

    }
}