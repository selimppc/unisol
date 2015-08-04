<?php

class HrOverTimeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_over_time()
    {
        $model = HrOverTime::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
//          ->select('id', 'sign_out - sign_in as stay_time')
            ->orderBy('id', 'DESC')
            ->get();

//      print_r($model);exit;

        $emp_name = HrEmployee::with('relUser','relUser.relUserProfile')->first();

        $employee_name_list = array(''=>'Select Employee') + User::GenuineEmployeeList();

        return View::make('hr::hr.over_time.index',
            compact('model','emp_name','employee_name_list'));
    }

    public function store_hr_over_time()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            #print_r($input_data);exit;
            $model = new HrOverTime();
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

    public function show_hr_over_time($ot_id)
    {
        $data = HrOverTime::findOrFail($ot_id);
        return View::make('hr::hr.over_time.view', compact('data'));
    }

    public function edit_hr_over_time($ot_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrOverTime::findOrFail($ot_id);
            if($model->validate($input_data)){
                DB::beginTransaction();
                try{
                    $model->update($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $model = HrOverTime::findOrFail($ot_id);
            $selected_employee_id = HrOverTime::first()->hr_employee_id;
            $employee_name_list = array(''=>'Select Employee') + User::GenuineEmployeeList();
            return View::make('hr::hr.over_time.edit', compact('model','selected_employee_id','lists_currency','employee_name_list'));
        }
    }

    public function destroy_hr_over_time($ot_id)
    {
        DB::beginTransaction();
        try{
            HrOverTime::destroy($ot_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_over_time()
    {
        DB::beginTransaction();
        try{
            HrOverTime::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }
}
