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




    


});
