<?php

class HrController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

   //hr_bank
	public function indexHrBank()
	{
        $model = HrBank::orderBy('id', 'DESC')->paginate(5);
        return View::make('hr::hr.hr_bank.index', compact('model'));
	}


	public function createHrBank()
	{
		//
	}


	public function storeHrBank()
	{
		//
	}



	public function showHrBank($id)
	{
		//
	}


	public function editHrBank($id)
	{
		//
	}



	public function updateHrBank($id)
	{
		//
	}


	public function deleteHrBank($id)
	{
		//
	}

    // hr_Salary_grade
    public function indexHrSalaryGrade()
    {
        //
    }


    public function createHrSalaryGrade()
    {
        //
    }


    public function storeHrSalaryGrade()
    {
        //
    }



    public function showHrSalaryGrade($id)
    {
        //
    }


    public function editHrSalaryGrade($id)
    {
        //
    }



    public function updateHrSalaryGrade($id)
    {
        //
    }


    public function deleteHrSalaryGrade($id)
    {
        //
    }


}
