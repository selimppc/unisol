<?php

class CommonController extends \BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function index()
    {
        return View::make('common::common.index');
    }
}
