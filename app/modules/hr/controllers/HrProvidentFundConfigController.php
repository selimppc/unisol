<?php

class HrProvidentFundConfigController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
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
            $id =Input::get('config_id');
            $model = $id ? HrProvidentFundConfig::find($id) : new HrProvidentFundConfig();

                if($model->validate($input_data)) {
                    DB::beginTransaction();
                    try{
                        if($id){
                            $model->update($input_data);
                            DB::commit();
                            Session::flash('message', 'Successfully Updated !');
                        }else{
                            $model->create($input_data);
                            DB::commit();
                            Session::flash('message', 'Successfully added !');
                        }
                    }catch ( Exception $e ){
                        DB::rollback();
                        Session::flash('danger', 'Failed !');
                    }
                }else{
                    Session::flash('danger', 'Invalid Request!!');
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
