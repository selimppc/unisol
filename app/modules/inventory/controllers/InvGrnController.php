<?php

class InvGrnController extends \BaseController {

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
        $data = InvGrnHead::all();
        return View::make('inventory::grn.index', compact('pageTitle', 'data'));
    }

    public function create_grn($grn_id, $po_id){
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
            #print_r($data);exit;
            $model = new InvGrnDetail();
            if ($model->validate($data)) {
                DB::beginTransaction();
                try {
                    $model->create($data);
                    DB::commit();
                    return Response::json("<span style='font-size: 18px; color: green'> GRN saved Successfully ! </span> ");
                } catch (Exception $e) {
                    print_r($e->getMessage());exit;
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    return Response::json("<span style='font-size: 18px; color: orangered'>Invalid Request ! </span> ");
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


    //TODO :: modal + ajax + reload content

}
