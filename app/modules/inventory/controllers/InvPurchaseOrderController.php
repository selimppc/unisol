<?php

class InvPurchaseOrderController extends \BaseController {

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /*
     *  ====================================================================================
     *  Purchase Order Head  Area
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
    public function index_purchase_order()
    {
        $pageTitle = 'Purchase Order Lists';
        $supplier_lists = InvSupplier::lists('company_name', 'id');
        $data = InvPurchaseOrderHead::where('status', '!=','cancel')->latest('id')->paginate('10');
        return View::make('inventory::po_head.index', compact('pageTitle', 'data', 'supplier_lists'));
    }

    /*
     * Store input data into  Purchase Order Head table
     *
     */
    public function store_purchase_order()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvPurchaseOrderHead();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();

    }

    /*
     * Show specific model data only
     * $po_id => purchase_order head ID
     */
    public function show_purchase_order($po_id){
        $data = InvPurchaseOrderHead::where('status', '!=','cancel')->find($po_id);
        $po_dt = InvPurchaseOrderDetail::where('inv_po_head_id', $data->id)->get();
        return View::make('inventory::po_head.show', compact('pageTitle', 'data', 'po_dt'));
    }

    /*
     * edit and update specific model data only
     * $re_id => purchase_order ID
     */
    public function edit_purchase_order($re_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvPurchaseOrderHead::findOrFail($re_id);
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
            $model = InvPurchaseOrderHead::findOrFail($re_id);
            return View::make('inventory::po_head.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $po_id => purchase_order ID
     */
    public function destroy_purchase_order($po_id){
        $model = InvPurchaseOrderHead::findOrFail($po_id);
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
    public function batch_delete_purchase_order()
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
     * Create GRN Order
     */
    public function create_grn($req_id){
        echo $req_id;

        /*$success = DB::select(
            'INSERT INTO inv_purchase_order_head SELECT * FROM inv_requisition_head WHERE inv_requisition_head.id = inv_purchase_order_head.inv_requisition_head_id'
        );*/
    }



    /*
     *  ====================================================================================
     *  purchase_order Detail Area
     *  =====================================================================================
     */

    /*
     * detail of purchase_order item(s)
     */
    public function detail_purchase_order($po_id){
        $po_head = InvPurchaseOrderHead::find($po_id);
        $po_dt = InvPurchaseOrderDetail::where('inv_po_head_id', $po_id)->get();
        return View::make('inventory::po_detail.add_edit', compact('po_id', 'po_head', 'po_dt'));
    }

    // AJax Product Search
    public function ajaxGetProductAutoComplete(){

        $term = Input::get('term');
        $results = array();
        $queries = DB::table('inv_product')
            ->where('title', 'LIKE', '%'.$term.'%')
            ->orWhere('code', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        foreach ($queries as $query)
        {
            $results[] = [
                'label' => $query->title.' - '.$query->code ,
                'id' => $query->id,
                'rate'=>$query->cost_price ,
                'unit' =>$query->purchase_unit,
                'po_unit_qty' =>$query->purchase_unit_quantity,
                'name' => $query->title
            ];
        }
        return Response::json($results);
    }


    /*
     * Store purchase_order Detail products
     *
     */
    public function store_purchase_order_detail(){
        $data = Input::all();
        for($i = 0; $i < count(Input::get('inv_product_id')) ; $i++){
            $dt[] = [
                'inv_po_head_id' => Input::get('inv_po_head_id'),
                'inv_product_id'=> Input::get('inv_product_id')[$i],
                'unit'=> Input::get('unit')[$i],
                'unit_quantity'=> Input::get('quantity')[$i],
                'purchase_rate'=> Input::get('rate')[$i],
            ];
        }
        $model = new InvPurchaseOrderDetail();
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
     * $id = purchase_order Detail ID
     *
     */
    public function ajax_delete_po_detail($id){
        $id = Input::get('id');
        DB::beginTransaction();
        try{
            InvPurchaseOrderDetail::destroy($id); //Batch::destroy(Request::get('id'));
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }


}
