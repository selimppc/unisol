<?php

class AccountPayableController extends \BaseController {

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
	public function index_account_payable()
	{
        $pageTitle = "Manage Account Payable ";
        $data = InvGrnHead::whereIN('status', ['GRN Confirmed', 'Invoiced'])->latest('id')->get();
        return View::make('payment::account_payable.index', compact('data','pageTitle'));
	}


    /*
     * $grn_id ::
     */
    public function show_detail_grn($grn_id){
        $grn_head = InvGrnHead::find($grn_id);
        $grn_dt = InvGrnDetail::where('inv_grn_head_id', $grn_id)->get();
        return View::make('payment::account_payable.show', compact('grn_id', 'grn_head', 'grn_dt'));
    }


    public function ap_create_invoice($grn_id){
        $check = InvGrnDetail::where('inv_grn_head_id', $grn_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_inv_to_invoice(?, ?)', array($grn_id, Auth::user()->get()->id ) );
            Session::flash('message', 'Invoiced Successfully !');
        }else{
            Session::flash('info', 'Failed!');
        }
        return Redirect::back();
    }

    // manage ap
    public function  manage_account_payable(){
        //
        $pageTitle = "Manage Account Payable";
        $data = AccVAppayable::get();
        //print_r($data);exit;
        return View::make('payment::account_payable.manage_ap', compact('pageTitle', 'data'));
    }

    // Account Payment Voucher
    public function  ap_payment_voucher(){
        //
        $pageTitle = "Manage Account Payable";
        $data = AccVAppayable::get();
        //print_r($data);exit;
        return View::make('payment::account_payable.ap_voucher', compact('pageTitle', 'data'));
    }

}
