<?php

class InvTrnNoSetupController extends \BaseController {

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

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index_setup()
    {
        $pageTitle = 'Transaction Number Setup';
        $data = InvTrnNoSetup::all();
        return View::make('inventory::setup.index', compact('pageTitle', 'data'));
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function trn_no_setup()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvTrnNoSetup();
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
        }
        return Redirect::back();
    }



    public function show_trn_no($setup_id){
        $data = InvTrnNoSetup::findOrFail($setup_id);
        return View::make('inventory::setup.show', compact('pageTitle', 'data'));
    }



    /*
     * master setup for inventory onyl
     *
     */
    public function master_setup(){
        $pageTitle = "Master Setup for Inventory";
        return View::make('inventory::master_setup.index', compact('pageTitle'));
    }

}
