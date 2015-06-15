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

    Route::any("detail-journal-voucher/{jv_id}", [
        "as"   => "detail-journal-voucher",
        "uses" => "AccJournalVoucherController@detail_journal_voucher"
    ]);


    Route::any("detail-jv-store", [
        "as"   => "detail-jv-store",
        "uses" => "AccJournalVoucherController@store_journal_voucher_detail"
    ]);

    Route::any("ajax-delete-jv-detail", [
        "as"   => "ajax-delete-jv-detail",
        "uses" => "AccJournalVoucherController@ajax_delete_journal_voucher_detail"
    ]);





    /*
     * ========================================================================
     * Payment Voucher
     * ========================================================================
     */





    /*
     * ========================================================================
     * Receipt Voucher
     * ========================================================================
     */





    /*
     * ========================================================================
     * Reverse Entry
     * ========================================================================
     */



});

