<?php

class InvAdjustmentController extends \BaseController {

	public function index_stock_adjustment(){
        $pageTitle = "Stock Adjustment ";
        $data = InvStoc::get();
        return View::make('inventory::stock.stock_view', compact('data','pageTitle'));
    }


}
