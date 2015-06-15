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
Route::group(['prefix' => 'accounts'], function() {

    Route::get('/', function() {
        return 'Thank you so much!';
    });


    Route::any("char-of-accounts", [
        "as"   => "char-of-accounts",
        "uses" => "AccChartOfAccountsController@index_chart_of_accounts"
    ]);

    Route::any("store-of-accounts", [
        "as"   => "store-of-accounts",
        "uses" => "AccChartOfAccountsController@store_chart_of_accounts"
    ]);

    Route::any("show-chart-of-accounts/{coa_id}", [
        "as"   => "show-chart-of-accounts",
        "uses" => "AccChartOfAccountsController@show_chart_of_accounts"
    ]);



});

