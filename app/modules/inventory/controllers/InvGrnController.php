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
        $po_dt = InvPurchaseOrderDetail::where('inv_po_head_id', $po_id)->get();
        $grn_dt = InvGrnDetail::where('inv_grn_head_id', $grn_id)->get();
        return View::make('inventory::grn.detail', compact(
            'po_dt' , 'po_id', 'grn_dt'
        ));
    }


    public function show_grn_detail($grn_id){

    }

}
