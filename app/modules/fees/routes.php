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

     /********************AMW*********************
    /************Billing Setup Start****************/

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

     /************Billing History Start****************/

        /***********Applicant************/
     Route::any('billing/history', [
         'as' => 'billing.history',
         'uses' => 'FeesController@index_billing_history'
     ]);

     Route::any('billing/history/show/{id}', [
         'as' => 'billing.history.show',
         'uses' => 'FeesController@billing_history_show'
     ]);

       /***********Student************/
     Route::any('billing/history/student', [
         'as' => 'billing.history.student',
         'uses' => 'FeesController@index_student_billing_history'
     ]);

     Route::any('billing/history/student/show/{id}', [
         'as' => 'billing.history.student.view',
         'uses' => 'FeesController@view_student_billing_history'
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
     Route::any('installment/setup/view/{batch_id}', [
         'as' => 'installment.setup.view',
         'uses' => 'FeesController@view_installment_setup'
     ]);

     /**********Billing Item Start****************/

     Route::any('billing/item', [
         'as' => 'billing.item',
         'uses' => 'FeesController@index_billing_item'
     ]);
     Route::any('item/save',[
         'as' => 'item.save',
         'uses'=> 'FeesController@save_item'
     ]);
     Route::any('item/edit/{id}',[
         'as' => 'item.edit',
         'uses'=> 'FeesController@edit_item'
     ]);
     Route::any('billing/item/update/{id}', [
         'as' => 'billing.item.update',
         'uses' => 'FeesController@update_billing_item'
     ]);

     /**********Billing Schedule Start****************/

     Route::any('billing/schedule', [
         'as' => 'billing.schedule',
         'uses' => 'FeesController@index_billing_schedule'
     ]);
     Route::any('schedule/save',[
         'as' => 'schedule.save',
         'uses'=> 'FeesController@save_schedule'
     ]);
     Route::any('schedule/edit/{id}',[
         'as' => 'schedule.edit',
         'uses'=> 'FeesController@edit_schedule'
     ]);
     Route::any('billing/schedule/update/{id}', [
         'as' => 'billing.schedule.update',
         'uses' => 'FeesController@update_billing_schedule'
     ]);


     /**********Billing Applicant head Start*************/

     Route::any('billing/summary/applicant', [
         'as' => 'billing.summary.applicant',
         'uses' => 'FeesController@index_billing_summary'
     ]);
     Route::any('billing/summary/applicant/save',[
         'as' => 'summary.applicant.save',
         'uses'=> 'FeesController@save_summary_applicant'
     ]);
     Route::any('billing/summary/applicant/view/{id}', [
         'as' => 'summary.applicant.view',
         'uses' => 'FeesController@view_applicant_summary'
     ]);
     Route::any('billing/summary/applicant/edit/{id}', [
         'as' => 'summary.applicant.edit',
         'uses' => 'FeesController@edit_applicant_summary'
     ]);
     Route::any('billing/summary/applicant/update/{id}', [
         'as' => 'summary.applicant.update',
         'uses' => 'FeesController@update_applicant_summary'
     ]);
     Route::any('billing-applicant-head-update', [
         'as' => 'billing-applicant-head-update',
         'uses' => 'FeesController@update_applicant_head_status'
     ]);

   /*************Billing Applicant Detail*****************/

     Route::any('billing-details-applicant/{id}', [
         'as' => 'billing.details.applicant',
         'uses' => 'FeesController@create_billing_details_applicant'
     ]);

     Route::any('billing-details-applicant-save', [
         'as' => 'billing.details.applicant.save',
         'uses' => 'FeesController@save_billing_details_applicant'
     ]);

     Route::post('detail/applicantdelete/ajax',
         'FeesController@ajax_delete_detail'
     );

     /**********Billing Student Head Start**************/

     Route::any('billing-summary-student', [
         'as' => 'billing.summary.student',
         'uses' => 'FeesController@index_billing_summary_student'
     ]);
     Route::any('billing-summary-student-save',[
         'as' => 'summary.student.save',
         'uses'=> 'FeesController@save_summary_student'
     ]);
     Route::any('billing-summary-student-view/{id}', [
         'as' => 'summary.student.view',
         'uses' => 'FeesController@view_summary_student'
     ]);
     Route::any('billing-summary-student/edit/{id}', [
         'as' => 'summary.student.edit',
         'uses' => 'FeesController@edit_summary_student'
     ]);
     Route::any('billing-summary-student-update/{id}', [
         'as' => 'summary.student.update',
         'uses' => 'FeesController@update_summary_student'
     ]);


     /*************************************************************************/

     /********************Student *********************
   /*******************billing setup******************/

     Route::any('student/billing/setup', [
         'as' => 'student.billing.setup',
         'uses' => 'FeesStudentController@index_student_billing'
     ]);

     Route::any('student/billing/setup/save', [
         'as' => 'student.billing.setup.save',
         'uses' => 'FeesStudentController@save_billing_type'
     ]);

     /********************billing history*********************/

     Route::any('student/billing/history', [
         'as' => 'student.billing.history',
         'uses' => 'FeesStudentController@index_billing_history'
     ]);

     Route::any('student/billing/history/view/{id}', [
         'as' => 'student.billing.history.view',
         'uses' => 'FeesStudentController@view_student_billing_history'
     ]);

     Route::any('applicant/billing/history/view/{id}', [
         'as' => 'applicant.billing.history.view',
         'uses' => 'FeesStudentController@view_applicant_billing_history'
     ]);


 });