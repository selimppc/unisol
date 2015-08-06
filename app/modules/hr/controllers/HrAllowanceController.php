<?php

class HrAllowanceController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_allowance
    public function index_hr_allowance()
    {
        $pageTitle = 'Allowance Lists';
        $model = HrAllowance::orderBy('id', 'DESC')->paginate(10);
        return View::make('hr::hr.allowance.index', compact('model','pageTitle'));
    }

    public function store_hr_allowance()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrAllowance();
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

    public function show_hr_allowance($b_id)
    {
        $data = HrAllowance::findOrFail($b_id);
        return View::make('hr::hr.allowance.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_allowance($b_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrAllowance::findOrFail($b_id);
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
            $model = HrAllowance::findOrFail($b_id);
            return View::make('hr::hr.allowance.edit', compact('model'));
        }
    }

    public function destroy_hr_allowance($b_id)
    {
        DB::beginTransaction();
        try{
            HrAllowance::destroy($b_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_allowance()
    {
        DB::beginTransaction();
        try{
            HrAllowance::destroy(Request::get('id'));
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
