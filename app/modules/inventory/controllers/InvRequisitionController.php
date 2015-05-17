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
        $data = InvRequisitionHead::all();
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
     * $s_id => Requisition ID
     */
    public function show_requisition($s_id){
        $data = InvRequisitionHead::findOrFail($s_id);
        return View::make('inventory::Requisition.show', compact('pageTitle', 'data'));
    }

    /*
     * edit and update specific model data only
     * $s_id => Requisition ID
     */
    public function edit_requisition($s_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvRequisitionHead::findOrFail($s_id);
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
            $model = InvRequisitionHead::findOrFail($s_id);
            return View::make('inventory::Requisition.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $s_id => Requisition ID
     */
    public function destroy_requisition($s_id){
        DB::beginTransaction();
        try{
            InvRequisitionHead::destroy($s_id);
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
     * Mass / Batch Delete from Requisition Category Table
     */
    public function batch_delete_requisition()
    {
        DB::beginTransaction();
        try{
            InvRequisitionHead::destroy(Request::get('id'));
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
     *  Requisition Detail Area
     *  =====================================================================================
     */


    public function detail_requisition($req_id){
        echo $req_id;
    }

}
