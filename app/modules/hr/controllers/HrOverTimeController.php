<?php

class HrOverTimeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//    public function index_hr_over_time($emp_id)
//    {
//        $pageTitle = 'Over Time Lists';
//        $model = HrOverTime::with('relHrEmployee','relHrEmployee.relUser','relHrEmployee.relUser.relUserProfile')
//            ->where('hr_employee_id', $emp_id)->get();
//
//        $emp_name = HrEmployee::with('relUser','relUser.relUserProfile')
//            ->where('id', $emp_id)->first();
//
//        #print_r($emp_name);exit;
//
//        $selected_employee_id = $emp_id;
//        return View::make('hr::hr.over_time.index', compact('model','pageTitle','selected_employee_id','emp_name'));
//    }

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
            return View::make('hr::hr.over_time.edit', compact('model','selected_employee_id','lists_currency'));
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
