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
    public function  ap_payment_voucher($supplier_id, $coa_id){
        #print_r("Supplier ID : ".$supplier_id."<br>");
        #print_r("Account code COA : ".$coa_id);exit;

        $data = AccChartOfAccounts::paginate(3);
        $year_lists = Year::lists('title', 'id');
        $period_lists = AccChartOfAccounts::list_period();
        $coa_lists = AccChartOfAccounts::lists('description', 'id');

        //Unpaid Invoice Lists
        $unpaid_invoice = AccVUnpaidInvoice::where('supplier_code', $supplier_id)
                        //->where('acc_voucher_head_id', $coa_id)->get();
                        ->get();

        return View::make('payment::account_payable.ap_voucher', compact(
            'supplier_id', 'coa_id', 'unpaid_invoice',
            'data','year_lists', 'period_lists', 'coa_lists'
        ));
    }

    public function store_ap_payment_voucher(){
        $input_data = Input::all();
        // Generate Voucher Number
        $apv_no = AccTrnNoSetup::where('title', '=', "Account Payable Voucher")
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
                    'voucher_number' => $apv_no,
                    'date' => $input_data['date'],
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
                    'prime_amount' => (-$input_data['total_amount']),
                    'base_amount' => (-$input_data['total_amount']),
                    'note'=> "open",
                ];
                $model_vdetail_credit->create($data_v_detail_credit);

                // Voucher Details Debit Data and Save
                $data_v_detail_debit = [
                    'acc_voucher_head_id' => $model_vhead->id,
                    'acc_chart_of_accounts_id' => $input_data['expense_account'],
                    'inv_supplier_id' => $input_data['inv_supplier_id'],
                    'prime_amount' => $input_data['total_amount'],
                    'base_amount' => $input_data['total_amount'],
                    'note'=> "open",
                ];
                $model_vdetail_debit->create($data_v_detail_debit);

                // Insert Allocation Invoice data and Store to ACC_AP_ALLOCATION TABLE
                for($i = 0; $i < count(Input::get('voucher_head_id')) ; $i++){
                    $data_ap_allocation[] = [
                        'voucher_number' => $model_vhead->voucher_number,
                        'acc_voucher_head_id' => $model_vhead->id,
                        'date' => $input_data['date'],
                        'prime_amount' => Input::get('amount')[$i],
                        'base_amount' => Input::get('amount')[$i],
                    ];
                }
                foreach($data_ap_allocation as $values){
                    $model_ap_allocation->create($values);
                }
                // Update Acc transaction Number
                DB::table('acc_trn_no_setup')->where('title', '=', "Account Payable Voucher")
                    ->update(array('last_number' => substr($apv_no, 4)));

                //RUN Store procedure
                DB::select('call sp_acc_voucherpost(?, ?)', array($model_vhead->voucher_number, Auth::user()->get()->id ) );

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
