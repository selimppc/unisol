<?php

class AccountReceivableController extends \BaseController {

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
	public function index_applicant_receivable()
	{
        $pageTitle = "Applicant Account Receivable ";
        $data = BillingApplicantHead::with('relApplicant')->whereIN('status', ['Confirmed', 'Invoiced'])->latest('id')->get();
        return View::make('payment::account_receivable.index', compact('data','pageTitle'));
	}


    /*
     * $grn_id ::
     */
    public function show_applicant_bill($bah_id){
        $ba_head = BillingApplicantHead::find($bah_id);
        $ba_dt = BillingApplicantDetail::where('billing_applicant_head_id', $bah_id)->get();
        return View::make('payment::account_receivable.show', compact('bah_id', 'ba_head', 'ba_dt'));
    }


    /*
     * ===============================================
     * create invoice
     * ===============================================
     */
    public function applicant_to_invoice( $billing_applicant_head_id )
    {
        $check = BillingApplicantDetail::where('billing_applicant_head_id', $billing_applicant_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_fees_applicant_to_invoice(?, ?)', array($billing_applicant_head_id, Auth::user()->get()->id ) );
            Session::flash('message', 'Invoiced Successfully !');
        }else{
            Session::flash('info', 'Applicant Billing Detail is empty. Please add Billing item. And try later!');
        }
        return Redirect::back();
    }



    // manage AR for applicant
    public function  manage_applicant_ar(){
        //
        $pageTitle = "Applicant Payment History"; //acc_v_ar_applicant
        $data = AccVArApplicant::get();
        return View::make('payment::account_receivable.applicant_ar_payable', compact('pageTitle', 'data'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
	public function destroy($id)
	{
		//
	}


}
