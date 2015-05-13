<?php

class InvProductController extends \BaseController {

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }



    /*
     *  ====================================================================================
     *  Product Category Area
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
	public function index_product_category()
	{
        $pageTitle = 'Product Category';
        $data = InvProductCategory::all();
        return View::make('inventory::product_category.index', compact('pageTitle', 'data'));
	}

    /*
     * Store input data into  product category table
     *
     */
	public function store_product_category()
	{
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvProductCategory();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
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
     * $pc_id => product category ID
     */
    public function show_product_category($pc_id){
        $data = InvProductCategory::findOrFail($pc_id);
        return View::make('inventory::product_category.show', compact('pageTitle', 'data'));
    }

    /*
     * edit and update specific model data only
     * $pc_id => product category ID
     */
    public function edit_product_category($pc_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvProductCategory::findOrFail($pc_id);
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
            $model = InvProductCategory::findOrFail($pc_id);
            return View::make('inventory::product_category.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $pc_id => product category ID
     */
    public function destroy_product_category($pc_id){
        DB::beginTransaction();
        try{
            InvProductCategory::destroy($pc_id);
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
    public function batch_delete_product_category()
    {
        DB::beginTransaction();
        try{
            InvProductCategory::destroy(Request::get('id'));
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
     *  Product  Area
     *  =====================================================================================
     */


    /*
     * All data list(s)
     */
    public function index_product()
    {
        $pageTitle = 'Product Items';
        $data = InvProduct::all();
        return View::make('inventory::product.index', compact('pageTitle', 'data'));
    }

    /*
     * Store input data into  product table
     *
     */
    public function store_product()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvProduct();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
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
     * $pc_id => product category ID
     */
    public function show_product($pc_id){
        $data = InvProduct::findOrFail($pc_id);
        return View::make('inventory::product.show', compact('pageTitle', 'data'));
    }

    /*
     * edit and update specific model data only
     * $pc_id => product category ID
     */
    public function edit_product($pc_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvProduct::findOrFail($pc_id);
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
            $model = InvProduct::findOrFail($pc_id);
            return View::make('inventory::product.edit', compact('model'));
        }

    }

    /*
     * Delete specific model data only
     * $pc_id => product category ID
     */
    public function destroy_product($pc_id){
        DB::beginTransaction();
        try{
            InvProduct::destroy($pc_id);
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
    public function batch_delete_product()
    {
        DB::beginTransaction();
        try{
            InvProduct::destroy(Request::get('id'));
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
     * if missing method in this controller with array of parameter(s)
     */
    public function missingMethod($parameters = array())
    {
        //
    }

}
