<?php

class InvStockController extends \BaseController {

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function stock_view()
	{
        $pageTitle = "Stock History ";
        $data = null;
        return View::make('inventory::stock.stock_view', compact('data','pageTitle'));
	}


    public function stock_dispatch(){
        $data = InvTransferHead::where('status', '!=', 'cancel')->get();
        $pageTitle = "Stock Dispatch(s) ";
        return View::make('inventory::stock.stock_dispatch', compact('data','pageTitle'));
    }

    public function store_stock_dispatch(){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvTransferHead();
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

    public function edit_stock_dispatch(){
        if($this->isPostRequest()){
            // code
        }else{
            return View::make('inventory::stock') ;
        }
    }

    public function show_stock_dispatch(){
        echo"OK";
    }

    public function cancel_stock_dispatch(){
        echo "OK";

    }

    public function approve_stock_dispatch(){
        echo "Hello";
    }


    public function add_product_dispatch(){
        echo "OK";
    }

    public function edit_product_dispatch(){

    }






}
