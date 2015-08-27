<?php

class ApRncController extends \BaseController {

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
	public function index_rnc_ar()
	{
		$pageTitle = "RNC Receivable History  ";
		$data = RncTransaction::with('relUser')->whereIN('status', ['Confirmed', 'Invoiced'])->latest('id')->get();
		return View::make('payment::rnc_ar.index', compact('data','pageTitle'));
	}


	/*
     * $rnc_id :: RNC Transaction ID
     */
	public function show_rnc_ar_bill($rnc_id){
		$rnc_head = RncTransaction::find($rnc_id);
		$rnc_dt = RncTransactionFinancial::where('rnc_transaction_id', $rnc_id)->get();
		return View::make('payment::rnc_ar.show', compact('rnc_id', 'rnc_head', 'rnc_dt'));
	}


	/*
     * ===============================================
     * create invoice for RNC Receivable
     * ===============================================
     */
	public function rnc_ar_to_invoice( $rnc_trn_id )
	{
		$check = RncTransactionFinancial::where('rnc_transaction_id', $rnc_trn_id)->exists();
		if($check){
			//Call Store Procedure
			DB::select('call sp_rnc_ar_to_invoice(?, ?)', array($rnc_trn_id, Auth::user()->get()->id ) );
			Session::flash('message', 'Invoiced Successfully !');
		}else{
			Session::flash('info', 'RNC Billing Detail is empty. Please add Billing item. And try later!');
		}
		return Redirect::back();
	}



	// manage AR for RNC
	public function  manage_ar_rnc_bill(){
		//
		$pageTitle = "RNC A/C Receivable History"; //acc_v_ar_lib
		$data = AccVArRnc::get();
		return View::make('payment::rnc_ar.rnc_ar_invoice', compact('pageTitle', 'data'));
	}


	// library_bill_voucher
	public function  rnc_ar_bill_voucher($associated_id, $coa_id){

		$data = AccChartOfAccounts::paginate(3);
		$year_lists = Year::lists('title', 'id');
		$period_lists = AccChartOfAccounts::list_period();
		$coa_lists = AccChartOfAccounts::lists('description', 'id');

		//Unpaid Invoice Lists
		$unpaid_invoice = AccVUnpaidInvLibrary::where('associated_id', $associated_id)
			//->where('acc_voucher_head_id', $coa_id)->get();
			->get();

		return View::make('payment::rnc_ar.rnc_ar_voucher', compact(
			'associated_id', 'coa_id', 'unpaid_invoice',
			'data','year_lists', 'period_lists', 'coa_lists'
		));
	}



	/*
     *
     * Store data into the following 4 table(s) at a time ::
     * 1. acc_ap_allocation
     * 2. acc_balance
     * 3. acc_voucher_detail
     * 4. acc_voucher_head
     *
     */
	public function store_rnc_ar_voucher(){
		//Get ALl input Data
		$input_data = Input::all();
		$associated_id = Input::get('associated_id');

		// Generate Voucher Number
		$apr_no = AccTrnNoSetup::where('title', '=', "RNC AR Voucher")
			->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
			->first()->number;

		//Models are here
		$model_vhead = new AccVoucherHead();
		$model_vdetail_credit = new AccVoucherDetail();
		$model_vdetail_debit = new AccVoucherDetail();
		$model_ap_allocation = new AccApAllocation();

		if($model_vhead->validate($input_data)) {
			DB::beginTransaction();
			try {
				//Acc Voucher Head data and Store
				$data_v_head = [
					'voucher_number' => $apr_no,
					'type' => "account-receivable-voucher",
					'date' => $input_data['date'],
					'reference' => "Student Money Receipt # ".$apr_no,
					'year_id' => $input_data['year_id'],
					'period' => $input_data['period'],
					'note' => $input_data['note'],
					#'status'=> "open",
					'status'=> "balanced",
				];
				$model_vhead = $model_vhead->create($data_v_head);

				// Voucher Details Credit Data and Save
				$data_v_detail_credit = [
					'acc_voucher_head_id' => $model_vhead->id,
					'acc_chart_of_accounts_id' => $input_data['acc_chart_of_accounts_id'],
					//'associated_id' => $associated_id, //$input_data['associated_id'],
					'prime_amount' => (-$input_data['total_amount']),
					'base_amount' => (-$input_data['total_amount']),
					'note'=> "open",
				];
				$model_vdetail_credit->create($data_v_detail_credit);

				// Voucher Details Debit Data and Save
				$data_v_detail_debit = [
					'acc_voucher_head_id' => $model_vhead->id,
					'acc_chart_of_accounts_id' => $input_data['expense_account'],
					'associated_id' => $associated_id, //$input_data['associated_id'],
					'prime_amount' => $input_data['total_amount'],
					'base_amount' => $input_data['total_amount'],
					'note'=> "open",
				];
				$model_vdetail_debit->create($data_v_detail_debit);

				// Insert Allocation Invoice data and Store to ACC_AP_ALLOCATION TABLE
				for($i = 0; $i < count(Input::get('voucher_head_id')) ; $i++){
					$data_ap_allocation[] = [
						'voucher_number' => $model_vhead->voucher_number,
						'acc_voucher_head_id' => $input_data['voucher_head_id'][$i],
						'date' => $input_data['date'],
						'prime_amount' => Input::get('amount')[$i],
						'base_amount' => Input::get('amount')[$i],
					];
				}
				foreach($data_ap_allocation as $values){
					$model_ap_allocation->create($values);
				}

				// Update Acc transaction Number
				DB::table('acc_trn_no_setup')->where('title', '=', "RNC AR Voucher")
					->update(array('last_number' => substr($apr_no, 4)));

				//RUN Store procedure
				DB::select('call sp_acc_voucherpost(?, ?)', array($model_vhead->id, Auth::user()->get()->id ) );

				//Commit the changes
				DB::commit();
				Session::flash('message', 'Success !');
			}catch (Exception $e) {
				//If there are any exceptions, rollback the transaction`
				DB::rollback();
				Session::flash('danger', $e->getMessage() );
			}
		}
		return Redirect::back();
	}


}
