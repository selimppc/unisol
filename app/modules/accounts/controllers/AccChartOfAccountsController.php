<?php

class AccChartOfAccountsController extends \BaseController {

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


    /*
     * All data list(s)
     */
    public function index_chart_of_accounts()
    {
        $pageTitle = 'Chart Of Accounts';
        $data = AccChartOfAccounts::latest('id')->paginate('10');
        return View::make('accounts::chart_of_accounts.index', compact('pageTitle', 'data'));
    }

    /*
     * Store input data into  Requisition table
     *
     */
    public function store_chart_of_accounts()
    {
        $input_data = Input::all();
        $model = new AccChartOfAccounts();
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
    }

    /*
     * Show specific model data only
     * $re_id => Requisition head ID
     */
    public function show_chart_of_accounts($coa_id){
        $data = AccChartOfAccounts::find($coa_id);
        return View::make('accounts::chart_of_accounts.show', compact('data'));
    }




}
