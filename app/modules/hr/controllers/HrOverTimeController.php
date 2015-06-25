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
        $pageTitle = 'Over Time Lists';


        return View::make('hr::hr.over_time.index', compact('model','pageTitle'));
    }

    public function store_hr_over_time()
    {

    }

    public function show_hr_over_time()
    {
        return View::make('hr::hr.over_time.view', compact('model'));
    }

    public function edit_hr_over_time()
    {
        return View::make('hr::hr.over_time.edit', compact('model'));
    }

    public function destroy_hr_over_time()
    {

    }

    public function batch_delete_hr_over_time()
    {

    }
}
