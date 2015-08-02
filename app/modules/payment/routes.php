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


    //manage account payable
    Route::any("manage-ap", [
        "as"   => "manage-ap",
        "uses" => "AccountPayableController@manage_account_payable"
    ]);

    //manage account payable
    Route::any("ap-payment-voucher/{associated_id}/{coa_id}", [
        "as"   => "ap-payment-voucher",
        "uses" => "AccountPayableController@ap_payment_voucher"
    ]);

    Route::any("store-ap-payment-voucher", [
        "as"   => "store-ap-payment-voucher",
        "uses" => "AccountPayableController@store_ap_payment_voucher"
    ]);



    /*
     * =============================================================
     * // Account Receivable for Applicant
     * =============================================================
     */

    // Account Receivable
    Route::any("applicant-receivable-index",[
        "as"   => "applicant-receivable-index",
        "uses" => "AccountReceivableController@index_applicant_receivable"
    ]);

    Route::any("details-applicant-receivable/{bah_id}",[
        "as"   => "details-applicant-receivable",
        "uses" => "AccountReceivableController@show_applicant_bill"
    ]);

    //create Applicant invoice
    Route::any('create-invoice-applicant/{bah_id}', [
        'as' => 'create-invoice-applicant',
        'uses' => 'AccountReceivableController@applicant_to_invoice'
    ]);

    //Manage Applicant AR
    Route::any('manage-applicant-ar', [
        'as' => 'manage-applicant-ar',
        'uses' => 'AccountReceivableController@manage_applicant_ar'
    ]);

    //manage Applicant Receivable Amount
    Route::any("applicant-ar-voucher/{associated_id}/{coa_id}", [
        "as"   => "applicant-ar-voucher",
        "uses" => "AccountReceivableController@applicant_receive_voucher"
    ]);

    // Store Applicant Payment / Money Receipt
    Route::any("store-applicant-ar-voucher", [
        "as"   => "store-applicant-ar-voucher",
        "uses" => "AccountReceivableController@store_applicant_ar_voucher"
    ]);



    /*
     * =============================================================
     * // Account Receivable for Student
     * =============================================================
     */

    // Account Receivable
    Route::any("student-receivable-index",[
        "as"   => "student-receivable-index",
        "uses" => "AccountReceivableController@index_student_receivable"
    ]);

    Route::any("details-student-receivable/{bah_id}",[
        "as"   => "details-student-receivable",
        "uses" => "AccountReceivableController@show_student_bill"
    ]);

    //create student invoice
    Route::any('create-invoice-student/{bah_id}', [
        'as' => 'create-invoice-student',
        'uses' => 'AccountReceivableController@student_to_invoice'
    ]);

    //Manage student AR
    Route::any('manage-student-ar', [
        'as' => 'manage-student-ar',
        'uses' => 'AccountReceivableController@manage_student_ar'
    ]);

    //manage Applicant Receivable Amount
    Route::any("student-ar-voucher/{associated_id}/{coa_id}", [
        "as"   => "student-ar-voucher",
        "uses" => "AccountReceivableController@student_receive_voucher"
    ]);

    // Store Applicant Payment / Money Receipt
    Route::any("store-student-ar-voucher", [
        "as"   => "store-student-ar-voucher",
        "uses" => "AccountReceivableController@store_student_ar_voucher"
    ]);





    /*
     * =============================================
     * For Library
     * =============================================
     */

    // Account Receivable
    Route::any("library-receivable-index",[
        "as"   => "library-receivable-index",
        "uses" => "ArLibraryController@index_library_receivable"
    ]);

    Route::any("library-details/{lib_id}",[
        "as"   => "library-details",
        "uses" => "ArLibraryController@show_library_bill"
    ]);

    //create Library invoice
    Route::any('library-create-invoice/{lib_id}', [
        'as' => 'library-create-invoice',
        'uses' => 'ArLibraryController@library_to_invoice'
    ]);

    //Manage Library Bill AR
    Route::any('manage-library-bill', [
        'as' => 'manage-library-bill',
        'uses' => 'ArLibraryController@manage_library_bill'
    ]);

    //manage Library Receivable Amount
    Route::any("Library-bill-voucher/{associated_id}/{coa_id}", [
        "as"   => "Library-bill-voucher",
        "uses" => "ArLibraryController@library_bill_voucher"
    ]);

    // Store Library Payment / Money Receipt
    Route::any("store-library-voucher", [
        "as"   => "store-library-voucher",
        "uses" => "ArLibraryController@store_library_voucher"
    ]);






});
