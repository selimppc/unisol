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


});
