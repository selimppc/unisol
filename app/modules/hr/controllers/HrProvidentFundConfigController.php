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
            $model = new HrProvidentFundConfig();
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

	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
