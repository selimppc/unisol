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
        $pageTitle = 'Bonus Lists';

        return View::make('hr::hr.bonus.index', compact('model','pageTitle'));
    }

    public function store_hr_bonus()
    {

    }

    public function show_hr_bonus()
    {
        return View::make('hr::hr.bonus.view', compact('model'));
    }

    public function edit_hr_bonus()
    {

        return View::make('hr::hr.bonus.edit', compact('model'));
    }

    public function destroy_hr_bonus()
    {

    }

    public function batch_delete_hr_bonus()
    {

    }
}