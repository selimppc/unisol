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
        $pageTitle = "Stock Dispatch(s) ";
        return View::make('inventory::stock.stock_dispatch', compact('pageTitle'));
    }

    public function create_stock_dispatch(){
        echo "OK";
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
