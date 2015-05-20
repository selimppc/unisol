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
        $pageTitle = 'Product Category';
        $data = InvProductCategory::all();
        return View::make('inventory::product_category.index', compact('pageTitle', 'data'));
    }

}
