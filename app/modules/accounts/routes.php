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



    /*
     * ========================================================================
     * Chart of Accounts
     * ========================================================================
     */
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





    /*
     * ========================================================================
     * Journal Voucher
     * ========================================================================
     */
    Route::any("journal-voucher", [
        "as"   => "journal-voucher",
        "uses" => "AccJournalVoucherController@index_journal_voucher"
    ]);

    Route::any("store-journal-voucher", [
        "as"   => "store-journal-voucher",
        "uses" => "AccJournalVoucherController@store_journal_voucher"
    ]);

    Route::any("show-journal-voucher/{jv_id}", [
        "as"   => "show-journal-voucher",
        "uses" => "AccJournalVoucherController@show_journal_voucher"
    ]);

    Route::any("edit-journal-voucher/{jv_id}", [
        "as"   => "edit-journal-voucher",
        "uses" => "AccJournalVoucherController@edit_journal_voucher"
    ]);

    Route::any("destroy-journal-voucher/{jv_id}", [
        "as"   => "destroy-journal-voucher",
        "uses" => "AccJournalVoucherController@destroy_journal_voucher"
    ]);

    Route::any("batch-delete-journal-voucher", [
        "as"   => "batch-delete-journal-voucher",
        "uses" => "AccJournalVoucherController@batch_delete_journal_voucher"
    ]);

    // Journal Voucher Details
    Route::any("detail-journal-voucher/{jv_id}", [
        "as"   => "detail-journal-voucher",
        "uses" => "AccJournalVoucherController@detail_journal_voucher"
    ]);

    Route::any("coa-auto-complete", [
        "as"   => "coa-auto-complete",
        "uses" => "AccJournalVoucherController@ajaxGetCoaAutoComplete"
    ]);


    Route::any("store-detail-jv", [
        "as"   => "store-detail-jv",
        "uses" => "AccJournalVoucherController@store_journal_voucher_detail"
    ]);

    Route::any("jv-ajax-delete-detail", [
        "as"   => "jv-ajax-delete-detail",
        "uses" => "AccJournalVoucherController@ajax_delete_journal_voucher_detail"
    ]);





    /*
     * ========================================================================
     * Payment Voucher
     * ========================================================================
     */

    Route::any("payment-voucher", [
        "as"   => "payment-voucher",
        "uses" => "AccPaymentVoucherController@index_payment_voucher"
    ]);
    Route::any("payment-voucher-store", [
        "as"   => "payment-voucher-store",
        "uses" => "AccPaymentVoucherController@store_payment_voucher"
    ]);

    Route::any("payment-voucher-show/{pay_id}", [
        "as"   => "payment-voucher-show",
        "uses" => "AccPaymentVoucherController@show_payment_voucher"
    ]);

    Route::any("payment-voucher-edit/{pay_id}", [
        "as"   => "payment-voucher-edit",
        "uses" => "AccPaymentVoucherController@edit_payment_voucher"
    ]);

    Route::any("payment-voucher-destroy/{pay_id}", [
        "as"   => "payment-voucher-destroy",
        "uses" => "AccPaymentVoucherController@destroy_payment_voucher"
    ]);

    Route::any("payment-voucher-batch-delete", [
        "as"   => "payment-voucher-batch-delete",
        "uses" => "AccPaymentVoucherController@batch_delete_payment_voucher"
    ]);

    // Payment Voucher Details
    Route::any("payment-voucher-detail/{pay_id}", [
        "as"   => "payment-voucher-detail",
        "uses" => "AccPaymentVoucherController@detail_payment_voucher"
    ]);

    /*Route::any("coa-auto-complete", [
        "as"   => "coa-auto-complete",
        "uses" => "AccPaymentVoucherController@ajaxGetCoaAutoComplete"
    ]);*/


    Route::any("payment-detail-store", [
        "as"   => "payment-detail-store",
        "uses" => "AccPaymentVoucherController@store_payment_voucher_detail"
    ]);

    Route::any("payment-detail-ajax-delete", [
        "as"   => "payment-detail-ajax-delete",
        "uses" => "AccPaymentVoucherController@ajax_delete_payment_voucher_detail"
    ]);



    /*
     * ========================================================================
     * Receipt Voucher
     * ========================================================================
     */
    Route::any("receipt-voucher", [
        "as"   => "receipt-voucher",
        "uses" => "AccReceiptVoucherController@index_receipt_voucher"
    ]);

    Route::any("receipt-voucher-store", [
        "as"   => "receipt-voucher-store",
        "uses" => "AccReceiptVoucherController@store_receipt_voucher"
    ]);

    Route::any("receipt-voucher-show/{rec_id}", [
        "as"   => "receipt-voucher-show",
        "uses" => "AccReceiptVoucherController@show_receipt_voucher"
    ]);

    Route::any("receipt-voucher-edit/{rec_id}", [
        "as"   => "receipt-voucher-edit",
        "uses" => "AccReceiptVoucherController@edit_receipt_voucher"
    ]);

    Route::any("receipt-voucher-destroy/{rec_id}", [
        "as"   => "receipt-voucher-destroy",
        "uses" => "AccReceiptVoucherController@destroy_receipt_voucher"
    ]);

    Route::any("receipt-voucher-batch-delete", [
        "as"   => "receipt-voucher-batch-delete",
        "uses" => "AccReceiptVoucherController@batch_delete_receipt_voucher"
    ]);

    // receipt Voucher Details
    Route::any("receipt-voucher-detail/{rec_id}", [
        "as"   => "receipt-voucher-detail",
        "uses" => "AccReceiptVoucherController@detail_receipt_voucher"
    ]);

    /*Route::any("coa-auto-complete", [
        "as"   => "coa-auto-complete",
        "uses" => "AccReceiptVoucherController@ajaxGetCoaAutoComplete"
    ]);*/


    Route::any("receipt-detail-store", [
        "as"   => "receipt-detail-store",
        "uses" => "AccReceiptVoucherController@store_receipt_voucher_detail"
    ]);

    Route::any("receipt-detail-ajax-delete", [
        "as"   => "receipt-detail-ajax-delete",
        "uses" => "AccReceiptVoucherController@ajax_delete_receipt_voucher_detail"
    ]);




    /*
     * ========================================================================
     * Reverse Entry
     * ========================================================================
     */
    Route::any("reverse-voucher", [
        "as"   => "reverse-voucher",
        "uses" => "AccReverseEntryController@index_reverse_voucher"
    ]);

    Route::any("reverse-voucher-store", [
        "as"   => "reverse-voucher-store",
        "uses" => "AccReverseEntryController@store_reverse_voucher"
    ]);

    Route::any("reverse-voucher-show/{rev_id}", [
        "as"   => "reverse-voucher-show",
        "uses" => "AccReverseEntryController@show_reverse_voucher"
    ]);

    Route::any("reverse-voucher-edit/{rev_id}", [
        "as"   => "reverse-voucher-edit",
        "uses" => "AccReverseEntryController@edit_reverse_voucher"
    ]);

    Route::any("reverse-voucher-destroy/{rev_id}", [
        "as"   => "reverse-voucher-destroy",
        "uses" => "AccReverseEntryController@destroy_reverse_voucher"
    ]);

    Route::any("reverse-voucher-batch-delete", [
        "as"   => "reverse-voucher-batch-delete",
        "uses" => "AccReverseEntryController@batch_delete_reverse_voucher"
    ]);

    // receipt Voucher Details
    Route::any("reverse-voucher-detail/{rev_id}", [
        "as"   => "reverse-voucher-detail",
        "uses" => "AccReverseEntryController@detail_reverse_voucher"
    ]);

    /*Route::any("coa-auto-complete", [
        "as"   => "coa-auto-complete",
        "uses" => "AccReverseEntryController@ajaxGetCoaAutoComplete"
    ]);*/


    Route::any("reverse-detail-store", [
        "as"   => "reverse-detail-store",
        "uses" => "AccReverseEntryController@store_reverse_voucher_detail"
    ]);

    Route::any("reverse-detail-ajax-delete", [
        "as"   => "reverse-detail-ajax-delete",
        "uses" => "AccReverseEntryController@ajax_delete_reverse_voucher_detail"
    ]);


    /*
     * =======================================================================
     * Accounts Transaction Setup
     * ======================================================================
     */
    Route::any("setup-transaction", [
        "as"   => "setup-transaction",
        "uses" => "AccTrnNoSetupController@index_setup"
    ]);

    Route::any("create-accounts-transaction", [
        "as"   => "create-accounts-transaction",
        "uses" => "AccTrnNoSetupController@create_transaction_Number"
    ]);


});

