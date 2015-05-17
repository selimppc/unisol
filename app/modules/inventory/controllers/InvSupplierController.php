<?php

class InvSupplierController extends \BaseController {

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /*
     *  ====================================================================================
     *  Supplier  Area
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
    public function index_supplier()
    {
        $pageTitle = 'Supplier Lists';
        $data = InvSupplier::all();
        return View::make('inventory::supplier.index', compact('pageTitle', 'data'));
    }

    /*
     * Store input data into  supplier table
     *
     */
    public function store_supplier()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvSupplier();
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
     * $s_id => supplier ID
     */
    public function show_supplier($s_id){
        $data = InvSupplier::findOrFail($s_id);
        return View::make('inventory::supplier.show', compact('pageTitle', 'data'));
    }

    /*
     * edit and update specific model data only
     * $s_id => supplier ID
     */
    public function edit_supplier($s_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvSupplier::findOrFail($s_id);
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
            $model = InvSupplier::findOrFail($s_id);
            return View::make('inventory::supplier.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $s_id => supplier ID
     */
    public function destroy_supplier($s_id){
        DB::beginTransaction();
        try{
            InvSupplier::destroy($s_id);
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
     * Mass / Batch Delete from supplier Category Table
     */
    public function batch_delete_supplier()
    {
        DB::beginTransaction();
        try{
            InvSupplier::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }



}
