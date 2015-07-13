<?php

class HrProvidentFundConfigController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('index')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
    public function index()
	{
        $model = HrProvidentFundConfig::get();
        return View::make('hr::hr.provident_fund_config.index',compact('model'));
	}

	public function store()
	{
        if($this->isPostRequest()){
            $input_data = Input::all();
//            print_r($input_data);exit;
            $id = Input::get('id');
            $employee_type = Input::get('employee_type');
            $contribution_amount = Input::get('contribution_amount');
            $company_contribution_0 = Input::get('company_contribution_0');
            $company_contribution_0 = Input::get('company_contribution_0');
            $company_contribution_25 = Input::get('company_contribution_20');
            $company_contribution_50 = Input::get('company_contribution_50');
            $company_contribution_75 = Input::get('company_contribution_75');
            $company_contribution_100 = Input::get('company_contribution_100');
            $model = ($id) ? HrProvidentFundConfig::find($id) : new HrProvidentFundConfig;

            if($id){
            echo 'in if';
            }else{
                echo 'in else';
            }
            exit;

            $model = new HrProvidentFundConfig();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !!');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
	}

    public function updatePvc($id){
        echo 'ok';exit;
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrProvidentFundConfig::findOrFail($id);
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
        }
    }

    public function ajaxDelete()
    {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            HrProvidentFundConfig::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
    }


}
