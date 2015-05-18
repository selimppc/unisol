<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'inventory'], function() {

    //Controller Resource(s) for specific method(s)
    Route::resource('product', 'InvProductController', [
            'only' => ['index']
    ]);



    /*
     *  ====================================================================================
     *  Product Category Area
     *  =====================================================================================
     */

    /// Product Category
    Route::get("product/category", [
        "as"   => "product/category",
        "uses" => "InvProductController@index_product_category"
    ]);

    Route::post("product/category/store", [
        "as"   => "product/category/store",
        "uses" => "InvProductController@store_product_category"
    ]);
    Route::any("product/category/show/{pc_id}", [
        "as"   => "product/category/show",
        "uses" => "InvProductController@show_product_category"
    ]);
    Route::any("product/category/edit/{pc_id}", [
        "as"   => "product/category/edit",
        "uses" => "InvProductController@edit_product_category"
    ]);
    Route::any("product/category/destroy/{pc_id}", [
        "as"   => "product/category/destroy",
        "uses" => "InvProductController@destroy_product_category"
    ]);
    Route::any("product/category/batch-delete", [
        "as"   => "product/category/batch-delete",
        "uses" => "InvProductController@batch_delete_product_category"
    ]);




    /*
     *  ====================================================================================
     *  Product  Area
     *  =====================================================================================
     */

    /// Product Category
    Route::get("product", [
        "as"   => "product",
        "uses" => "InvProductController@index_product"
    ]);

    Route::post("product/store", [
        "as"   => "product/store",
        "uses" => "InvProductController@store_product"
    ]);
    Route::any("product/show/{pc_id}", [
        "as"   => "product/show",
        "uses" => "InvProductController@show_product"
    ]);
    Route::any("product/edit/{pc_id}", [
        "as"   => "product/edit",
        "uses" => "InvProductController@edit_product"
    ]);
    Route::any("product/destroy/{pc_id}", [
        "as"   => "product/destroy",
        "uses" => "InvProductController@destroy_product"
    ]);
    Route::any("product-batch-delete", [
        "as"   => "product-batch-delete",
        "uses" => "InvProductController@batch_delete_product"
    ]);



    /*
     *  ====================================================================================
     *  Supplier  Area
     *  =====================================================================================
     */

    /// Supplier
    Route::get("supplier", [
        "as"   => "supplier",
        "uses" => "InvSupplierController@index_supplier"
    ]);

    Route::post("supplier/store", [
        "as"   => "supplier/store",
        "uses" => "InvSupplierController@store_supplier"
    ]);
    Route::any("supplier/show/{pc_id}", [
        "as"   => "supplier/show",
        "uses" => "InvSupplierController@show_supplier"
    ]);
    Route::any("supplier/edit/{pc_id}", [
        "as"   => "supplier/edit",
        "uses" => "InvSupplierController@edit_supplier"
    ]);
    Route::any("supplier/destroy/{pc_id}", [
        "as"   => "supplier/destroy",
        "uses" => "InvSupplierController@destroy_supplier"
    ]);
    Route::any("supplier-batch-delete", [
        "as"   => "supplier-batch-delete",
        "uses" => "InvSupplierController@batch_delete_supplier"
    ]);



    /*
     *  ====================================================================================
     *  Requisition  Area
     *  =====================================================================================
     */

    /// Supplier
    Route::get("requisition", [
        "as"   => "requisition",
        "uses" => "InvRequisitionHeadController@index_requisition"
    ]);


    Route::post("requisition-store", [
        "as"   => "requisition-store",
        "uses" => "InvRequisitionHeadController@store_requisition"
    ]);

    Route::get("requisition-show/{req_id}", [
        "as"   => "requisition-show",
        "uses" => "InvRequisitionHeadController@show_requisition"
    ]);
    Route::get("requisition-edit/{req_id}", [
        "as"   => "requisition-edit",
        "uses" => "InvRequisitionHeadController@edit_requisition"
    ]);
    Route::post("requisition-destroy", [
        "as"   => "requisition-destroy",
        "uses" => "InvRequisitionHeadController@destroy_requisition"
    ]);

    Route::post("create/purchase-order", [
        "as"   => "create/purchase-order",
        "uses" => "InvRequisitionHeadController@create_purchase_order"
    ]);

    /*
     *  ====================================================================================
     *  Requisition Detail  Area
     *  =====================================================================================
     */
    Route::any("requisition-detail/{req_id}", [
        "as"   => "requisition-detail",
        "uses" => "InvRequisitionHeadController@detail_requisition"
    ]);

    Route::any("ajax/get-product-auto-complete", [
        "as"   => "ajax/get-product-auto-complete",
        "uses" => "InvRequisitionHeadController@ajaxGetProductAutoComplete"
    ]);



});
