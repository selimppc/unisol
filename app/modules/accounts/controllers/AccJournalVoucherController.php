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
        $data = AccVoucherHead::where('status', '!=','cancel')->latest('id')->paginate('10');
        return View::make('accounts::journal_voucher.index', compact('pageTitle', 'data'));
    }

    /*
     * Store input data into  Requisition table
     *
     */
    public function store_journal_voucher()
    {
        if($this->isPostRequest()){
            $req_no = InvTrnNoSetup::where('title', '=', "Requisition")
                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
                ->first()->number;
            $input_data = Input::all();
            $inp_data = [
                'requisition_no' => $req_no,
                'inv_supplier_id' => $input_data['inv_supplier_id'],
                'date' => $input_data['date'],
                'note' => $input_data['note'],
                'requisition_type' => $input_data['requisition_type'],
                'status'=> "open",
            ];
            $model = new InvRequisitionHead();
            if($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
                    DB::table('inv_trn_no_setup')->where('title', '=', "Requisition")
                        ->update(array('last_number' => substr($req_no,4)));
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            #$model = InvRequisitionHead::findOrFail($re_id);
            return View::make('inventory::requisition_head.create', compact('model'));
        }
    }

    /*
     * Show specific model data only
     * $re_id => Requisition head ID
     */
    public function show_journal_voucher($jv_id){
        $data = InvRequisitionHead::where('status', '!=','cancel')->find($jv_id);
        $req_dt = InvRequisitionDetail::where('inv_requisition_head_id', $data->id)->get();
        return View::make('inventory::requisition_head.show', compact('pageTitle', 'data', 'req_dt'));
    }

    /*
     * edit and update specific model data only
     * $re_id => Requisition ID
     */
    public function edit_journal_voucher($re_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvRequisitionHead::findOrFail($re_id);
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
            $model = InvRequisitionHead::findOrFail($re_id);
            return View::make('inventory::requisition_head.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $re_id => Requisition ID
     */
    public function destroy_journal_voucher($re_id){
        $model = InvRequisitionHead::findOrFail($re_id);
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
            InvRequisitionHead::whereIn('id', Request::get('id'))->update(['status'=> 'cancel']);
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
    public function detail_journal_voucher($req_id){
        $req_head = InvRequisitionHead::find($req_id);
        $req_dt = InvRequisitionDetail::where('inv_requisition_head_id', $req_id)->get();
        return View::make('inventory::requisition_detail.add_edit', compact('req_id', 'req_head', 'req_dt'));
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
