<?php

class EmployeeController extends \BaseController {

    function __construct() {
        $this->beforeFilter('employee', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function employeeIndex(){
        $user_id = Auth::user()->get()->id;
        $hr_employee_id = HrEmployee::where('user_id','=',$user_id)->first()->id;print_r($hr_employee_id);exit;
        $hr_list = User::HrList();
        $leave_type_id = HrLeaveType::lists('title','id');
        $employee_list = User::EmployeeList();
        $data = HrLeave::with('relUser','relUser.relUserProfile','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->get();
//        print_r($data);exit;

        return View::make('hr::hr.leave.hr_employee',compact('hr_list','leave_type_id','employee_list','data'));
    }

	public function storeHrLeave()
	{
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrLeave();

            print_r($input_data);exit;
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
