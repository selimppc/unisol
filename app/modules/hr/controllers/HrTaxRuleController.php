<?php

class HrTaxRuleController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_tax_rule
    public function index_hr_tax_rule()
    {
        $pageTitle = 'Tax Rule List';
        $model = HrTaxRule::orderBy('id', 'DESC')->paginate(10);
        return View::make('hr::hr.tax_rule.index', compact('model','pageTitle'));
    }

    public function store_hr_tax_rule()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrTaxRule();
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

    public function show_hr_tax_rule($t_r_id)
    {
        $data = HrTaxRule::findOrFail($t_r_id);
        return View::make('hr::hr.tax_rule.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_tax_rule($t_r_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrTaxRule::findOrFail($t_r_id);
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
            $model = HrTaxRule::findOrFail($t_r_id);
            return View::make('hr::hr.tax_rule.edit', compact('model'));
        }
    }

    public function destroy_hr_tax_rule($t_r_id)
    {
        DB::beginTransaction();
        try{
            HrTaxRule::destroy($t_r_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_delete_hr_tax_rule()
    {
        DB::beginTransaction();
        try{
            HrTaxRule::destroy(Request::get('id'));
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
