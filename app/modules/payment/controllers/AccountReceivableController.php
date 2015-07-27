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



    /*
     * ==========================================================
     * ==========================================================
     *  FOR APPLICANT
     * ==========================================================
     * ==========================================================
     */



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index_applicant_receivable()
	{
        $pageTitle = "Applicant Account Receivable ";
        $data = BillingApplicantHead::with('relApplicant')->whereIN('status', ['Confirmed', 'Invoiced'])->latest('id')->get();
        return View::make('payment::account_receivable.applicant.index', compact('data','pageTitle'));
	}


    /*
     * $grn_id ::
     */
    public function show_applicant_bill($bah_id){
        $ba_head = BillingApplicantHead::find($bah_id);
        $ba_dt = BillingApplicantDetail::where('billing_applicant_head_id', $bah_id)->get();
        return View::make('payment::account_receivable.applicant.show', compact('bah_id', 'ba_head', 'ba_dt'));
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
        return View::make('payment::account_receivable.applicant.applicant_ar_payable', compact('pageTitle', 'data'));
    }


    // Applicant Receivable Voucher
    public function  applicant_receive_voucher($associated_id, $coa_id){

        $data = AccChartOfAccounts::paginate(3);
        $year_lists = Year::lists('title', 'id');
        $period_lists = AccChartOfAccounts::list_period();
        $coa_lists = AccChartOfAccounts::lists('description', 'id');

        //Unpaid Invoice Lists
        $unpaid_invoice = AccVUnpaidInvApplicant::where('associated_id', $associated_id)
            //->where('acc_voucher_head_id', $coa_id)->get();
            ->get();

        return View::make('payment::account_receivable.applicant.applicant_ar_voucher', compact(
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
    public function store_applicant_ar_voucher(){
        //Get ALl input Data
        $input_data = Input::all();
        $associated_id = Input::get('associated_id');

        // Generate Voucher Number
        $apr_no = AccTrnNoSetup::where('title', '=', "Account Receivable Voucher")
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
                    'reference' => "Applicant Money Receipt # ".$apr_no,
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
                DB::table('acc_trn_no_setup')->where('title', '=', "Account Receivable Voucher")
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




    /*
     * ==========================================================
     * ==========================================================
     *  FOR STUDENT
     * ==========================================================
     * ==========================================================
     */


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index_student_receivable()
    {
        $pageTitle = "Student Account Receivable ";
        $data = BillingStudentHead::with('relUser')->whereIN('status', ['Confirmed', 'Invoiced'])->latest('id')->get();
        return View::make('payment::account_receivable.student.index', compact('data','pageTitle'));
    }


    /*
     * $grn_id ::
     */
    public function show_student_bill($bsh_id){
        $bs_head = BillingStudentHead::find($bsh_id);
        $bs_dt = BillingStudentDetail::where('billing_student_head_id', $bsh_id)->get();
        return View::make('payment::account_receivable.student.show', compact('bsh_id', 'bs_head', 'bs_dt'));
    }


    /*
     * ===============================================
     * create invoice
     * ===============================================
     */
    public function student_to_invoice( $billing_student_head_id )
    {
        $check = BillingStudentDetail::where('billing_student_head_id', $billing_student_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_fees_student_to_invoice(?, ?)', array($billing_student_head_id, Auth::user()->get()->id ) );
            Session::flash('message', 'Invoiced Successfully !');
        }else{
            Session::flash('info', 'Student Billing Detail is empty. Please add Billing item. And try later!');
        }
        return Redirect::back();
    }



    // manage AR for student
    public function  manage_student_ar(){
        //
        $pageTitle = "Student Payment History"; //acc_v_ar_applicant
        $data = AccVArStudent::get();
        return View::make('payment::account_receivable.student.student_ar_payable', compact('pageTitle', 'data'));
    }


    // student Receivable Voucher
    public function  student_receive_voucher($associated_id, $coa_id){

        $data = AccChartOfAccounts::paginate(3);
        $year_lists = Year::lists('title', 'id');
        $period_lists = AccChartOfAccounts::list_period();
        $coa_lists = AccChartOfAccounts::lists('description', 'id');

        //Unpaid Invoice Lists
        $unpaid_invoice = AccVUnpaidInvStudent::where('associated_id', $associated_id)
            //->where('acc_voucher_head_id', $coa_id)->get();
            ->get();

        return View::make('payment::account_receivable.student.student_ar_voucher', compact(
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
    public function store_student_ar_voucher(){
        //Get ALl input Data
        $input_data = Input::all();
        $associated_id = Input::get('associated_id');

        // Generate Voucher Number
        $apr_no = AccTrnNoSetup::where('title', '=', "Account Receivable Voucher")
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
                DB::table('acc_trn_no_setup')->where('title', '=', "Account Receivable Voucher")
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
