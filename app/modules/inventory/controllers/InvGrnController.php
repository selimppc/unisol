<?php

class InvGrnController extends \BaseController {

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
     *  ====================================================================================
     *  GRN
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
    public function index_grn()
    {
        $pageTitle = 'GRN History';
        $data = InvGrnHead::latest('id')->get();
        return View::make('inventory::grn.index', compact('pageTitle', 'data'));
    }

    public function create_new_grn($grn_id, $po_id){
        $grn_head = InvGrnHead::find($grn_id);
        $po_head = InvPurchaseOrderHead::find($po_id);
        $po_dt = InvPurchaseOrderDetail::where('inv_po_head_id', $po_id)->get();
        $grn_dt = InvGrnDetail::where('inv_grn_head_id', $grn_id)->get();
        return View::make('inventory::grn.detail', compact(
            'grn_head', 'po_head', 'po_dt' , 'po_id', 'grn_dt'
        ));
    }


    public function show_grn_detail($grn_id){
        $grn_head = InvGrnHead::find($grn_id);
        $grn_dt = InvGrnDetail::where('inv_grn_head_id', $grn_id)->get();
        return View::make('inventory::grn.show', compact('grn_id', 'grn_head', 'grn_dt'));
    }

    public function ajax_grn_detail_store(){
        if(Request::ajax()) {
            $data = Input::all();
            $model = new InvGrnDetail();
            if ($model->validate($data)) {
                DB::beginTransaction();
                try {
                    if($data = $model->create($data)){
                        $product = InvProduct::findOrFail($data->inv_product_id);
                        $results = [
                            'id' => $data->id,
                            'product_code' => $product->code,
                            'product_name' => $product->title,
                            'expire_date' => $data->expire_date,
                            'receive_quantity' => $data->receive_quantity,
                            'cost_price' => $data->cost_price,
                            'unit' => $data->unit,
                            'row_amount' => $data->row_amount,
                        ];
                    }
                    DB::commit();
                    return Response::json($results);
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    #$mes = "<span style='font-size: 18px; color: orangered'>Invalid Request ! </span> ";
                    $mes = ['msg' => "Invalid"];
                    return Response::json($mes);
                }
            }
        }
    }


    /*
     * $g_id = GRN Detail ID
     *
     */
    public function ajax_delete_grn_detail($g_id){
        $id = Input::get('g_id');
        DB::beginTransaction();
        try{
            InvGrnDetail::destroy($id); //Batch::destroy(Request::get('id'));
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }

    public function confirm_grn($grn_id){
        $check = InvGrnDetail::where('inv_grn_head_id', $grn_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_inv_confirm_grn(?, ?)', array($grn_id, Auth::user()->get()->id ) );
            Session::flash('message', 'GRN Confirmed !');
        }else{
            Session::flash('info', 'GRN Detail is empty. Please add product item. And try later!');
        }
        return Redirect::back();
    }





    //TODO :: modal + ajax + reload content

}
