<?php

class HrLeaveController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
    {
        $data = HrLeave::with('relYear')->orderBy('id', 'DESC')->paginate(5);
        $hr_id = User::HrList();
        $leave_type_id = HrLeaveType::lists('title','id');
//        $alt_hr_employee_id
        
        return View::make('hr::hr.leave.index',compact('data','hr_id','leave_type_id'));
    }

    public function storeLeave()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrLeave();
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

    public function showWorkWeek($id)
    {
        $model = HrWorkWeek::with('relYear')->find($id);
        return View::make('hr::hr.work_week.show',compact('model'));
    }

    public function editWorkWeek($id){

        $model = HrWorkWeek::find($id);
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $month = HrWorkWeek::getMonth();
        $day = HrWorkWeek::getDay();
        return View::make('hr::hr.work_week.edit',compact('model','year','month','day'));
    }

    public function updateWorkWeek($id){

        $data = Input::all();
        $model = HrWorkWeek::find($id);

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

    public function deleteWorkWeek($id)
    {
        try {
            $data = HrWorkWeek::find($id);
            if ($data->delete()) {
                Session::flash('message', "Successfully  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDelete()
    {
        try {
            HrWorkWeek::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
