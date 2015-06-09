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

Route::group(['prefix' => 'payment'], function() {

    Route::get('/', function() {
        return 'Thank you so much!';
    });

    Route::any("index-account-payable", [
        "as"   => "index-account-payable",
        "uses" => "AccountPayableController@index_account_payable"
    ]);


    Route::any("details-of-grn/{grn_id}", [
        "as"   => "details-of-grn",
        "uses" => "AccountPayableController@show_detail_grn"
    ]);

    Route::any("ap-create-invoice/{grn_id}", [
        "as"   => "ap-create-invoice",
        "uses" => "AccountPayableController@ap_create_invoice"
    ]);


});
