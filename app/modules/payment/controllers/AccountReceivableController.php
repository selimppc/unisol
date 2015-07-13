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
