<?php

class AcmAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('academicAmw', array('except' => array('index')));
    }
	public function index()
	{

	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
