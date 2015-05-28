<?php

class InvAdjustmentController extends \BaseController {

	public function index_stock_adjustment(){
        $pageTitle = "Stock Adjustment ";
        $data = InvStoc::get();
        return View::make('inventory::adjust_head.index', compact('data','pageTitle'));
    }


}
