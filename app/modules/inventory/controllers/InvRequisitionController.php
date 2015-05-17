<?php

class InvRequisitionHeadController extends \BaseController {


    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /*
     *  ====================================================================================
     *  Requisition  Area
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
    public function index_requisition()
    {
        $pageTitle = 'Requisition Lists';
        $data = InvRequisitionHead::latest('id')->paginate('10');
        return View::make('inventory::requisition_head.index', compact('pageTitle', 'data'));
    }

    /*
     * Store input data into  Requisition table
     *
     */
    public function store_requisition()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvRequisitionHead();
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
     * $re_id => Requisition head ID
     */
    public function show_requisition($re_id){
        $data = InvRequisitionHead::where('status', '!=','cancel')->find($re_id);
        $req_dt = InvRequisitionDetail::where('inv_requisition_head_id', $data->id)->get();
        return View::make('inventory::requisition_head.show', compact('pageTitle', 'data', 'req_dt'));
    }

    /*
     * edit and update specific model data only
     * $re_id => Requisition ID
     */
    public function edit_requisition($re_id){
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
    public function destroy_requisition($re_id){
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
     * Create Purchase Order
     */
    public function create_purchase_order($req_id){
        echo $req_id;
    }



    /*
     *  ====================================================================================
     *  Requisition Detail Area
     *  =====================================================================================
     */


    public function detail_requisition($req_id){
        $req_head = InvRequisitionHead::find($req_id);
        return View::make('inventory::requisition_detail.add_edit', compact('req_id', 'req_head'));
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
            ];
        }
        return Response::json($results);
    }


}
