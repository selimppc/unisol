<?php

class EmployeeController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function employeeIndex(){

        $employee_id = Auth::user()->get()->id;
        $hr_employee_id = HrEmployee::where('user_id','=',$employee_id)->first()->id;

        $hr_list = User::HrList();
        $leave_type_id = HrLeaveType::lists('title','id');
        $employee_list = User::ExceptLoggedUser();

        $data = HrLeave::with('relUser','relUser.relUserProfile','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
               ->where('hr_employee_id','=',$hr_employee_id)->get();

        return View::make('hr::hr.leave.hr_employee',compact('hr_list','leave_type_id','employee_list','data','hr_employee_id'));
    }

	public function storeHrLeave()
	{
        if($this->isPostRequest()){
            $input_data = Input::all();

            $model = new HrLeave();
            $model->hr_employee_id =  Input::get('hr_employee_id');
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

    public function showLeave($id)
    {
        $model = HrLeave::with('relUser','relUser.relUserProfile','relHrAltEmployee','relHrAltEmployee.relUser','relHrAltEmployee.relUser.relUserProfile')->find($id);
        return View::make('hr::hr.leave.show',compact('model'));
    }
    public function editLeave($id){

        $model = HrLeave::find($id);
        $employee_list = User::ExceptLoggedUser();
        $hr_list = User::HrList();
        $leave_type_id = HrLeaveType::lists('title','id');
        $employee_id = Auth::user()->get()->id;

        $hr_employee_id = HrEmployee::where('user_id','=',$employee_id)->first()->id;
        $comments = HrLeaveComments::with('relHrLeave')->where('hr_leave_id','=',$id)->get();
        return View::make('hr::hr.leave.edit',compact('model','employee_list','leave_type_id','comments','hr_list','hr_employee_id'));
    }

    public function updateLeave($id){

        $data = Input::all();
        $model = HrLeave::find($id);

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteLeave($id)
    {
        try {
            $data = HrLeave::find($id);
            if ($data->delete()) {
                Session::flash('message', "Successfully  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function storeComments(){

    }

    public function viewComments($id){

        $model = HrLeave::find($id);
        $comments = HrLeaveComments::with('relHrLeave')->where('hr_leave_id','=',$id)->get();

        return View::make('hr::hr.leave.comments',compact('model','comments'));
    }

    public function updateComments(){

        $data = Input::all();
        $model1 = HrLeave::find($data['id']);
        $model1->update($data);

        $model2 = new HrLeaveComments();
        $model2 ->hr_leave_id = $data['id'];
        $model2->comment = Input::get('comment');
        if($model2->save()){
            Session::flash('message', 'Comments Added Successfully');
            return Redirect::back();
        }else{
            Session::flash('message', 'Comments Do not Added');
            return Redirect::back();
        }

    }

}
