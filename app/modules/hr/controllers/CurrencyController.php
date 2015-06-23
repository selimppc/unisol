<?php

class CurrencyController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_bank
    public function index_currency()
    {
        $pageTitle = 'Currency Lists';
        $model = Currency::orderBy('id', 'DESC')->paginate(5);
        return View::make('hr::currency.index', compact('model','pageTitle'));
    }

    public function store_currency()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new Currency();
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

    public function show_currency($c_id)
    {
        $data = Currency::findOrFail($c_id);
        return View::make('hr::currency.view', compact('pageTitle', 'data'));
    }

    public function edit_currency($c_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = Currency::findOrFail($c_id);
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
            $model = Currency::findOrFail($c_id);
            return View::make('hr::currency.edit', compact('model'));
        }
    }

    public function destroy_currency($c_id)
    {
        DB::beginTransaction();
        try{
            Currency::destroy($c_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_currency()
    {
        DB::beginTransaction();
        try{
            Currency::destroy(Request::get('id'));
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
