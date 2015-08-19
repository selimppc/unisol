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
Route::group(['prefix' => 'rnc'], function() {

    include("routes_sh_fac.php");
    include("routes_sh_std.php");

    Route::get('/', function() {
        return 'Thank you so much!';
    });



//Route for AMW User
    //Category. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/category/index',[
        'as' => 'amw.category.index',
        'uses'=> 'RncAmwController@indexCategory'
    ]);

    Route::any('amw/category/add/{id}',[
        'as' => 'amw.category.add',
        'uses'=> 'RncAmwController@addCategory'
    ]);

    Route::any('amw/category/store',[
        'as' => 'amw.category.store',
        'uses'=> 'RncAmwController@storeCategory'
    ]);

    Route::any('amw/category/show/{id}',[
        'as' => 'amw.category.show',
        'uses'=> 'RncAmwController@showCategory'
    ]);

    Route::any('amw/category/edit/{id}',[
        'as' => 'amw.category.edit',
        'uses'=> 'RncAmwController@editCategory'
    ]);

    Route::any('amw/category/update/{id}',[
        'as' => 'amw.category.update',
        'uses'=> 'RncAmwController@updateCategory'
    ]);

    Route::any('amw/category/delete/{id}',[
        'as' => 'amw.category.delete',
        'uses'=> 'RncAmwController@deleteCategory'
    ]);

    Route::any('amw/category/batch-delete',[
        'as' => 'amw.category.batch-delete',
        'uses'=> 'RncAmwController@batchDeleteCategory'
    ]);

    //Config. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    Route::any('amw/config/index',[
        'as' => 'amw.config.index',
        'uses'=> 'RncAmwController@indexConfig'
    ]);

    Route::any('amw/config/add/{id}',[
        'as' => 'amw.config.add',
        'uses'=> 'RncAmwController@addConfig'
    ]);

    Route::any('amw/config/store',[
        'as' => 'amw.config.store',
        'uses'=> 'RncAmwController@storeConfig'
    ]);

    Route::any('amw/config/show/{id}',[
        'as' => 'amw.config.show',
        'uses'=> 'RncAmwController@showConfig'
    ]);

    Route::any('amw/config/edit/{id}',[
        'as' => 'amw.config.edit',
        'uses'=> 'RncAmwController@editConfig'
    ]);

    Route::any('amw/config/update/{id}',[
        'as' => 'amw.config.update',
        'uses'=> 'RncAmwController@updateConfig'
    ]);

    Route::any('amw/config/delete/{id}',[
        'as' => 'amw.config.delete',
        'uses'=> 'RncAmwController@deleteConfig'
    ]);

    Route::any('amw/config/batch-delete',[
        'as' => 'amw.config.batch-delete',
        'uses'=> 'RncAmwController@batchDeletConfig'
    ]);

    //Publisher. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/publisher/index',[
        'as' => 'amw.publisher.index',
        'uses'=> 'RncAmwController@indexPublisher'
    ]);

    Route::any('amw/publisher/add/{id}',[
        'as' => 'amw.publisher.add',
        'uses'=> 'RncAmwController@addPublisher'
    ]);

    Route::any('amw/publisher/store',[
        'as' => 'amw.publisher.store',
        'uses'=> 'RncAmwController@storePublisher'
    ]);

    Route::any('amw/publisher/show/{id}',[
        'as' => 'amw.publisher.show',
        'uses'=> 'RncAmwController@showPublisher'
    ]);

    Route::any('amw/publisher/edit/{id}',[
        'as' => 'amw.publisher.edit',
        'uses'=> 'RncAmwController@editPublisher'
    ]);

    Route::any('amw/publisher/update/{id}',[
        'as' => 'amw.publisher.update',
        'uses'=> 'RncAmwController@updatePublisher'
    ]);

    Route::any('amw/publisher/delete/{id}',[
        'as' => 'amw.publisher.delete',
        'uses'=> 'RncAmwController@deletePublisher'
    ]);

    Route::any('amw/publisher/batch-delete',[
        'as' => 'amw.publisher.batch-delete',
        'uses'=> 'RncAmwController@batchDeletPublisher'
    ]);

    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/research-paper/index',[
        'as' => 'amw.research-paper.index',
        'uses'=> 'RncAmwController@indexResearchPaper'
    ]);

    Route::any('amw/research-paper/save',[
        'as' => 'amw.research-paper.save',
        'uses'=> 'RncAmwController@storeResearchPaper'
    ]);

    Route::any('amw/research-paper/view/{id}',[
        'as' => 'amw.research-paper.view',
        'uses'=> 'RncAmwController@viewResearchPaper'
    ]);

    Route::any('amw/research-paper/edit/{id}',[
        'as' => 'amw.research-paper.edit',
        'uses'=> 'RncAmwController@editResearchPaper'
    ]);

    Route::any('amw/research-paper/update/{id}', [
        'as' => 'amw.research-paper.update',
        'uses' => 'RncAmwController@updateResearchPaper'
    ]);

    Route::any('amw/research-paper/delete/{id}',[
        'as' => 'amw.research-paper.delete',
        'uses' => 'RncAmwController@deleteResearchPaper'
    ]);

    Route::any('amw/research-paper/batch-delete/{id}', [
        'as' => 'amw.research-paper.batch-delete',
        'uses' => 'RncAmwController@batchdeleteResearchPaper'
    ]);

    Route::any('amw/research-paper/download/{rnc_id}',[
        'as' =>'amw.research-paper.download',
        'uses' => 'RncAmwController@researchPaperDownload'
    ]);

    Route::any('amw/research-paper/read/{rnc_id}',[
        'as' =>'amw.research-paper.read',
        'uses' => 'RncAmwController@researchPaperRead'
    ]);

    Route::any('amw/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'amw.research-paper.comment',
        'uses' => 'RncAmwController@researchPaperComment'
    ]);

    Route::any('amw/research-paper/save-comment',[
        'as' =>'amw.research-paper.save-comment',
        'uses' => 'RncAmwController@saveComment'
    ]);



//new

    Route::any('amw/research-paper-writer-beneficial/list/{rnc_r_p_id}',[
        'as' =>'amw.research-paper-writer-beneficial.list',
        'uses' => 'RncAmwController@listWriterBeneficial'
    ]);

    Route::any('amw/research-paper-writer-beneficial/store-writer-beneficial', [
        'as'   => 'amw.research-paper-writer-beneficial.store-writer-beneficial',
        'uses' => 'RncAmwController@store_writer_beneficial'
    ]);

    Route::any('amw/research-paper-writer-beneficial/ajax-delete-req-detail', [
        'as'   => 'amw.research-paper-writer-beneficial.ajax-delete-req-detail',
        'uses' => 'RncAmwController@fac_ajax_delete_req_detail'
    ]);

    Route::any('amw/research-paper-writer-beneficial/update',[
        'as' => 'amw.research-paper-writer-beneficial.update',
        'uses'=> 'RncAmwController@updateWriterBeneficial'
    ]);

    Route::any("ajax/amw-get-writer-name-auto-complete", [
        "as"   => "ajax.amw-get-writer-name-auto-complete",
        "uses" => "RncAmwController@ajaxGetWriterNameAutoComplete"
    ]);

    // Transaction Head

    Route::any('amw/transaction-head',[
        'as' => 'amw.transaction-head',
        'uses'=> 'RncAmwController@indexRNCTransactionHead'
    ]);

    Route::any('amw/store-transaction-head',[
        'as' => 'amw.store-transaction-head',
        'uses'=> 'RncAmwController@rncStoreTransaction'
    ]);

    Route::any('amw/transaction-head-batch-delete',[
        'as' => 'amw.transaction-head-batch-delete',
        'uses'=> 'RncAmwController@rncTransactionHeadBatchDelete'
    ]);

    Route::any('amw/transaction-detail/{r_t_id}',[
        'as' => 'amw.transaction-detail',
        'uses'=> 'RncAmwController@rncTransactionDetail'
    ]);

    Route::any('amw/store-rnc-transaction-detail',[
        'as' => 'amw.store-rnc-transaction-detail',
        'uses'=> 'RncAmwController@storeTransactionDetail'
    ]);

    Route::any('amw/ajax-delete-rnc-trn-dtl', [
        'as'   => 'amw/ajax-delete-rnc-trn-dtl',
        'uses' => 'RncAmwController@ajaxDeleteRNCTrnDtl'
    ]);

    Route::any('amw/transaction-head/show-confirm/{r_t_id}',[
        'as' => 'amw.transaction-head.show-confirm',
        'uses'=> 'RncAmwController@rncShowConfirmTransaction'
    ]);

    Route::any('amw/transaction-head/show/{r_t_id}',[
        'as' => 'amw.transaction-head.show',
        'uses'=> 'RncAmwController@rncShowTransaction'
    ]);

    Route::any('amw/transaction-head/edit/{r_t_id}',[
        'as' => 'amw.transaction-head.edit',
        'uses'=> 'RncAmwController@rncEditConfirmTransaction'
    ]);

    Route::any('amw/transaction-head/destroy/{r_t_id}',[
        'as' => 'amw.transaction-head.destroy',
        'uses'=> 'RncAmwController@rncDestroyTransaction'
    ]);

    Route::any('amw/confirm-transaction-head/{r_t_id}',[
        'as' => 'amw.confirm-transaction-head',
        'uses'=> 'RncAmwController@rncConfirmTransaction'
    ]);










});

