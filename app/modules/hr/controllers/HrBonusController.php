<?php

class HrBonusController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function index_hr_bonus()
    {

    }

    public function store_hr_bonus()
    {

    }

    public function show_hr_bonus()
    {

    }

    public function edit_hr_bonus()
    {

    }

    public function destroy_hr_bonus()
    {

    }

    public function batch_delete_hr_bonus()
    {

    }
}