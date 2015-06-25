<?php

class HrOverTimeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_over_time()
    {

    }

    public function store_hr_over_time()
    {

    }

    public function show_hr_over_time()
    {

    }

    public function edit_hr_over_time()
    {

    }

    public function destroy_hr_over_time()
    {

    }

    public function batch_delete_hr_over_time()
    {

    }
}
