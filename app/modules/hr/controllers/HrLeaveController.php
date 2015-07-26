<?php

class HrLeaveController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
    {
        $data = new HrLeave();
        if($this->isPostRequest()) {
            $employee_list = Input::get('hr_employee_id');
            $date1 = Input::get('from_date');
            $date2 = Input::get('to_date');
            $leave_type = Input::get('hr_leave_type_id');
            $status = Input::get('status');

            $data = $data->with('relUser','relUser.relUserProfile','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile');
            if (isset($employee_list) && !empty($employee_list)) $data->where('hr_leave.hr_employee_id', '=', $employee_list);
            if (isset($date1) && !empty($date1)) $data->where('hr_leave.from_date', '=', $date1);
            if (isset($date2) && !empty($date2)) $data->where('hr_leave.to_date', '=', $date2);
            if (isset($status) && !empty($status)) $data->where('hr_leave.status', '=', $status);
            if (isset($leave_type) && !empty($leave_type)) $data->where('hr_leave.hr_leave_type_id', '=', $leave_type);
            $data = $data->orderBy('id', 'DESC')->paginate(5);
        }
        else{
            $data = $data->with('relUser','relUser.relUserProfile','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->orderBy('id', 'DESC')->paginate(5);
        }
        $leave_type_id = HrLeaveType::lists('title','id');
        $employee_list = User::EmployeeList();
        $hr_list = User::HrList();
        $date1 = HrLeave::lists('from_date','from_date');
        $date2 = HrLeave::lists('to_date','to_date');
        $leave_type = HrLeaveType::lists('title','id');
        $status = HrLeave::lists('status','status');

        Input::flash();
        return View::make('hr::hr.leave.index',compact('data','employee_list','leave_type_id','hr_list','date1','date2','leave_type','status'));
    }

    public function storeLeave()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
//            print_r($input_data);exit;
            $model = new HrLeave();
            $model->hr_employee_id = Input::get('hr_employee_id');
            $model->forward_to = Input::get('forward_to');
            $model->hr_leave_type_id = Input::get('hr_leave_type_id');
            $model->reason = Input::get('reason');
            $model->leave_duration = Input::get('leave_duration');
            $model->from_date = Input::get('from_date');
            $model->to_date = Input::get('to_date');
            $model->alt_contact_no = Input::get('alt_contact_no');
            $model->alt_hr_employee_id = Input::get('alt_hr_employee_id');
            $model->status = Input::get('status');
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    if($model->create($input_data)){
                         $model1 = new HrLeaveComments();
                         $model1->hr_leave_id = $model->id;
                         $model1->comment = Input::get('comment');
                       If($model1->create($input_data)){
                          DB::commit();
                          Session::flash('message', 'Success !');
                       }
                    }
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
        $model = HrLeave::with('relHrLeaveType','relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')->find($id);
//        print_r($model);exit;
        return View::make('hr::hr.leave.show',compact('model'));
    }

    public function editLeave($id){

        $model = HrLeave::find($id);
        $employee_list = User::EmployeeList();
        $hr_list = User::HrList();
        $leave_type_id = HrLeaveType::lists('title','id');
        $comments = HrLeaveComments::with('relHrLeave')->where('hr_leave_id','=',$id)->get();
        return View::make('hr::hr.leave.edit',compact('model','employee_list','leave_type_id','comments','hr_list'));
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

    public function batchDelete()
    {
        try {
            HrLeave::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function viewComments($id){
        $model = HrLeave::find($id);
        $comments = HrLeaveComments::with('relHrLeave')->where('hr_leave_id','=',$id)->get();
//        print_r($comments);exit;
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
