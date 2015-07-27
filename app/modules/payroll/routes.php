<?php

/*
|--------------------------------------------------------------------------
| Payroll Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'payroll'], function() {

    Route::get('/index', function() {
        return 'Thank you so much!';
    });

    Route::any("index-account-payable", [
        "as"   => "index-account-payable",
        "uses" => "AccountPayableController@index_account_payable"
    ]);

});
