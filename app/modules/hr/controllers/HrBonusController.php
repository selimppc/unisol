<?php

class HrBonusController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_bonus()
    {
        $pageTitle = 'Bonus Lists';
        $model = HrBonus::orderBy('id', 'DESC')->paginate(5);
        return View::make('hr::hr.bonus.index', compact('model','pageTitle'));
    }

    public function store_hr_bonus()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrBonus();
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

    public function show_hr_bonus($bn_id)
    {
        $data = HrBonus::findOrFail($bn_id);
        return View::make('hr::hr.bonus.view', compact('data'));
    }

    public function edit_hr_bonus($bn_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrBonus::findOrFail($bn_id);
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
            $model = HrBonus::findOrFail($bn_id);
            return View::make('hr::hr.bonus.edit', compact('model'));
        }

    }

    public function destroy_hr_bonus($bn_id)
    {
        DB::beginTransaction();
        try{
            HrBonus::destroy($bn_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_bonus()
    {
        DB::beginTransaction();
        try{
            HrBonus::destroy(Request::get('id'));
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