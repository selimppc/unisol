<?php

class PayrollController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
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
    public function index_hr_payroll()
    {
        $pageTitle = "HR Payroll";
        $data = HrSalaryTransactionHead::whereIN('status', ['Confirmed', 'Invoiced'])->latest('id')->get();
        return View::make('payroll::index', compact('data','pageTitle'));
    }


    /*
     * $trn_id :: HR Salary Transaction ID
     */
    public function show_hr_transaction($trn_id){
        $hr_trn_head = HrSalaryTransactionHead::find($trn_id);
        $hr_trn_dt = HrSalaryTransactionDetail::where('salary_trn_hd_id', $trn_id)->get();
        return View::make('payroll::show', compact('trn_id', 'hr_trn_head', 'hr_trn_dt'));
    }


    /*
     *  $trn_id :: Hr Salary Transaction Head ID
     */
    public function hr_create_invoice($trn_id){
        $check = HrSalaryTransactionDetail::where('salary_trn_hd_id', $trn_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_hr_to_invoice(?, ?)', array($trn_id, Auth::user()->get()->id ) );
            Session::flash('message', 'Invoiced Successfully !');
        }else{
            Session::flash('info', 'Failed!');
        }
        return Redirect::back();
    }

    // manage HR Invoiced Data
    public function  manage_hr_invoice(){
        $pageTitle = "Manage HR Salary Invoice";
        $data = AccVApHr::get();
        return View::make('payroll::hr_invoice', compact('pageTitle', 'data'));
    }

    // Salary Payment Voucher
    public function  hr_payment_voucher($associated_id, $coa_id){

        $data = AccChartOfAccounts::paginate(3);
        $year_lists = Year::lists('title', 'id');
        $period_lists = AccChartOfAccounts::list_period();
        $coa_lists = AccChartOfAccounts::lists('description', 'id');

        //Unpaid Invoice Lists
        $unpaid_invoice = AccVUnpaidinvHr::where('associated_id', $associated_id)
            //->where('acc_voucher_head_id', $coa_id)->get();
            ->get();

        return View::make('payroll::hr_voucher', compact(
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
    public function store_hr_salary_voucher(){
        exit("OK");
        //Get ALl input Data
        $input_data = Input::all();

        // Generate Voucher Number
        $apv_no = AccTrnNoSetup::where('title', '=', "HR Salary")
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
                    'type' => "hr-salary",
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
                    //'associated_id' => Input::get('associated_id'),
                    'prime_amount' => (-$input_data['total_amount']),
                    'base_amount' => (-$input_data['total_amount']),
                    'note'=> "open",
                ];
                $model_vdetail_credit->create($data_v_detail_credit);

                // Voucher Details Debit Data and Save
                $data_v_detail_debit = [
                    'acc_voucher_head_id' => $model_vhead->id,
                    'acc_chart_of_accounts_id' => $input_data['expense_account'],
                    'associated_id' => $input_data['associated_id'],
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
                DB::table('acc_trn_no_setup')->where('title', '=', "HR Salary ")
                    ->update(array('last_number' => substr($apv_no, 4)));

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
