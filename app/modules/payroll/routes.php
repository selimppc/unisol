<?php

/*
|--------------------------------------------------------------------------
| Payroll Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'payroll'], function() {

    Route::get('/', function() {
        return 'Oops! Lost your payroll system ? !';
    });

    Route::any("hr-payroll", [
        "as"   => "hr-payroll",
        "uses" => "PayrollController@index_hr_payroll"
    ]);


    // trn_id :: Salary Transaction Head ID
    Route::any("show-hr-trn/{trn_id}", [
        "as"   => "show-hr-trn",
        "uses" => "PayrollController@show_hr_transaction"
    ]);

    // trn_id :: Salary Transaction Head ID
    Route::any("hr-create-invoice/{trn_id}", [
        "as"   => "hr-create-invoice",
        "uses" => "PayrollController@hr_create_invoice"
    ]);


    //manage Hr Invoice
    Route::any("manage-hr-invoice", [
        "as"   => "manage-hr-invoice",
        "uses" => "PayrollController@manage_hr_invoice"
    ]);

    //manage Hr payable Voucher
    Route::any("hr-payment-voucher/{associated_id}/{coa_id}", [
        "as"   => "hr-payment-voucher",
        "uses" => "PayrollController@hr_payment_voucher"
    ]);

    Route::any("hr-salary-voucher-store", [
        "as"   => "hr-salary-voucher-store",
        "uses" => "PayrollController@store_hr_salary_voucher"
    ]);

});
