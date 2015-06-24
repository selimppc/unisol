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
 Route::group(['prefix' => 'fees'], function() {


    Route::get('/', function() {
        return 'Thank you so much!';
    });

    /**********Billing Setup Start****************/

     Route::any('billing/setup', [
         'as' => 'billing.setup',
         'uses' => 'FeesController@indexBillingSetup'
     ]);
    Route::any('billing/create', [
         'as' => 'billing.create',
         'uses' => 'FeesController@createBillingSetup'
     ]);
    Route::any('billing/drop-down-batch',[
     'as' =>'amw.drop-down-batch',
     'uses' => 'FeesController@createAjaxBatchList'
    ]);
    Route::any('billing/setup/save', [
        'as' => 'billing.setup.save',
        'uses' => 'FeesController@storeBillingSetup'
    ]);
    Route::any('billing/setup/view/{id}', [
        'as' => 'billing.setup.view',
        'uses' => 'FeesController@viewBillingSetup'
    ]);
    Route::any('billing/setup/edit/{id}', [
        'as' => 'billing.setup.edit',
        'uses' => 'FeesController@editBillingSetup'
    ]);
    Route::any('billing/setup/update/{id}', [
        'as' => 'billing.setup.update',
        'uses' => 'FeesController@updateBillingSetup'
    ]);
    Route::any('billing/setup/delete/{id}', [
         'as' => 'billing.setup.delete',
         'uses' => 'FeesController@deleteBillingSetup'
     ]);
    Route::any('billing/setup/batch/delete/{id}', [
        'as' => 'billing.setup.batch.delete',
        'uses' => 'FeesController@batchdeleteBillingSetup'
    ]);


     /**********Billing History Start****************/

     Route::any('billing/history', [
         'as' => 'billing.history',
         'uses' => 'FeesController@index_billing_history'
     ]);

     Route::any('billing/history/show/{id}/{app_stu_id}', [
         'as' => 'billing.history.show',
         'uses' => 'FeesController@billing_history_show'
     ]);


     /**********Installment Setup Start****************/

     Route::any('installment/setup', [
         'as' => 'installment.setup',
         'uses' => 'FeesController@index_installment_setup'
     ]);

     Route::any('installment/setup/create', [
         'as' => 'installment.setup.create',
         'uses' => 'FeesController@create_installment_setup'
     ]);

     Route::any('installment/setup/save', [
         'as' => 'installment.setup.save',
         'uses' => 'FeesController@save_installment_setup'
     ]);


 });