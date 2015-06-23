<?php

class AccTrnNoSetupController extends \BaseController {

    function __construct() {
        $this->beforeFilter('amw', array('except' => array('')));
    }

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_setup(){

        $pageTitle = "Accounts Transaction Setup ";
        return View::make('accounts::setup.index', compact('pageTitle'));
    }

    public function create_transaction_Number(){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new AccTrnNoSetup();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $data = AccTrnNoSetup::get();
            return View::make('accounts::setup.accounts_transaction', compact('data'));
        }
    }




}
