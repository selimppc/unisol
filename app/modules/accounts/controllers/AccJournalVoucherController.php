<?php

class AccJournalVoucherController extends \BaseController {

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
    public function index_journal_voucher()
    {
        $pageTitle = 'Journal Voucher Lists';
        $year = ['' => 'Select Year'] + Year::lists('title', 'id');
        $period = AccChartOfAccounts::list_period();
        $data = AccVoucherHead::where('status', '!=','cancel')->latest('id')->paginate('10');
        return View::make('accounts::journal_voucher.index', compact(
            'pageTitle', 'data', 'year', 'period'
        ));
    }

    /*
     * Store input data into  Requisition table
     *
     */
    public function store_journal_voucher()
    {
        if($this->isPostRequest()) {
            $jv_no = AccTrnNoSetup::where('title', '=', "Journal Voucher")
                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
                ->first()->number;
            $input_data = Input::all();
            $inp_data = [
                'voucher_number' => $jv_no,
                'date' => $input_data['date'],
                'reference' => $input_data['reference'],
                'year_id' => $input_data['year_id'],
                'period' => $input_data['period'],
                'note' => $input_data['note'],
                'status' => "open",
            ];
            $model = new AccVoucherHead();
            if ($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
                    DB::table('acc_trn_no_setup')->where('title', '=', "Journal Voucher")
                        ->update(array('last_number' => substr($jv_no, 4)));
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }
    }

    /*
     * Show specific model data only
     * $re_id => Requisition head ID
     */
    public function show_journal_voucher($jv_id){
        $data = AccVoucherHead::where('status', '!=','cancel')->find($jv_id);
        $jv_dt = AccVoucherDetail::where('acc_voucher_head_id', $data->id)->get();
        return View::make('accounts::journal_voucher.show', compact('pageTitle', 'data', 'jv_dt'));
    }

    /*
     * edit and update specific model data only
     * $re_id => Requisition ID
     */
    public function edit_journal_voucher($jv_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = AccVoucherHead::findOrFail($jv_id);
            if($model->validate($input_data)){
                DB::beginTransaction();
                try{
                    $model->update($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $year = ['' => 'Select Year'] + Year::lists('title', 'id');
            $period = AccChartOfAccounts::list_period();
            $model = AccVoucherHead::findOrFail($jv_id);
            return View::make('accounts::journal_voucher.edit', compact('model', 'year', 'period'));
        }

    }

    /*
     * Delete specific model data only
     * $re_id => Requisition ID
     */
    public function destroy_journal_voucher($jv_id){
        $model = AccVoucherHead::findOrFail($jv_id);
        $model->status = 'cancel';
        DB::beginTransaction();
        try{
            $model->save();
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }


    /*
     * Mass / Batch Delete from Product Category Table
     */
    public function batch_delete_journal_voucher()
    {
        DB::beginTransaction();
        try{
            AccVoucherHead::whereIn('id', Request::get('id'))->update(['status'=> 'cancel']);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }





    /*
     *  ====================================================================================
     *  journal_voucher Detail Area
     *  =====================================================================================
     */

    /*
     * detail of requisition item(s)
     */
    public function detail_journal_voucher($jv_id){
        $jv_head = AccVoucherHead::find($jv_id);
        $jv_dt = AccVoucherDetail::where('acc_voucher_head_id', $jv_id)->get();
        return View::make('accounts::journal_voucher_detail.add_edit', compact('jv_id', 'jv_head', 'jv_dt'));
    }



    /*
     * Store Requisition Detail products
     *
     */
    public function store_journal_voucher_detail(){
        $data = Input::all();
        for($i = 0; $i < count(Input::get('inv_product_id')) ; $i++){
            $dt[] = [
                'inv_requisition_head_id' => Input::get('inv_requisition_head_id'),
                'inv_product_id'=> Input::get('inv_product_id')[$i],
                'rate'=> Input::get('rate')[$i],
                'unit'=> Input::get('unit')[$i],
                'quantity'=> Input::get('quantity')[$i],
            ];
        }
        $model = new InvRequisitionDetail();
        DB::beginTransaction();
        try{
            foreach($dt as $values){
                $model->create($values);
            }
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }


    /*
     * $id = Requisition Detail ID
     *
     */
    public function ajax_delete_journal_voucher_detail($id){
        $id = Input::get('id');
        DB::beginTransaction();
        try{
            InvRequisitionDetail::destroy($id); //Batch::destroy(Request::get('id'));
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }


}
