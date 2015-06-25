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

    public function index_hr_salary_allowance_allowance()
    {

    }

    public function store_hr_salary_allowance()
    {

    }

    public function show_hr_salary_allowance()
    {

    }

    public function edit_hr_salary_allowance()
    {

    }

    public function destroy_hr_salary_allowance()
    {

    }

    public function batch_delete_hr_salary_allowance()
    {

    }
}