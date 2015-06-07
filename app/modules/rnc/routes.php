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
        'uses'=> 'RnCAmwController@indexCategory'
    ]);

    Route::any('amw/category/add/{id}',[
        'as' => 'amw.category.add',
        'uses'=> 'RnCAmwController@addCategory'
    ]);

    Route::any('amw/category/store',[
        'as' => 'amw.category.store',
        'uses'=> 'RnCAmwController@storeCategory'
    ]);

    Route::any('amw/category/show/{id}',[
        'as' => 'amw.category.show',
        'uses'=> 'RnCAmwController@showCategory'
    ]);

    Route::any('amw/category/edit/{id}',[
        'as' => 'amw.category.edit',
        'uses'=> 'RnCAmwController@editCategory'
    ]);

    Route::any('amw/category/update/{id}',[
        'as' => 'amw.category.update',
        'uses'=> 'RnCAmwController@updateCategory'
    ]);

    Route::any('amw/category/delete/{id}',[
        'as' => 'amw.category.delete',
        'uses'=> 'RnCAmwController@deleteCategory'
    ]);

    Route::any('amw/category/batch-delete',[
        'as' => 'amw.category.batch-delete',
        'uses'=> 'RnCAmwController@batchDeleteCategory'
    ]);

    //Config. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    Route::any('amw/config/index',[
        'as' => 'amw.config.index',
        'uses'=> 'RnCAmwController@indexConfig'
    ]);

    Route::any('amw/config/add/{id}',[
        'as' => 'amw.config.add',
        'uses'=> 'RnCAmwController@addConfig'
    ]);

    Route::any('amw/config/store',[
        'as' => 'amw.config.store',
        'uses'=> 'RnCAmwController@storeConfig'
    ]);

    Route::any('amw/config/show/{id}',[
        'as' => 'amw.config.show',
        'uses'=> 'RnCAmwController@showConfig'
    ]);

    Route::any('amw/config/edit/{id}',[
        'as' => 'amw.config.edit',
        'uses'=> 'RnCAmwController@editConfig'
    ]);

    Route::any('amw/config/update/{id}',[
        'as' => 'amw.config.update',
        'uses'=> 'RnCAmwController@updateConfig'
    ]);

    Route::any('amw/config/delete/{id}',[
        'as' => 'amw.config.delete',
        'uses'=> 'RnCAmwController@deleteConfig'
    ]);

    Route::any('amw/config/batch-delete',[
        'as' => 'amw.config.batch-delete',
        'uses'=> 'RnCAmwController@batchDeletConfig'
    ]);

    //Publisher. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/publisher/index',[
        'as' => 'amw.publisher.index',
        'uses'=> 'RnCAmwController@indexPublisher'
    ]);

    Route::any('amw/publisher/add/{id}',[
        'as' => 'amw.publisher.add',
        'uses'=> 'RnCAmwController@addPublisher'
    ]);

    Route::any('amw/publisher/store',[
        'as' => 'amw.publisher.store',
        'uses'=> 'RnCAmwController@storePublisher'
    ]);

    Route::any('amw/publisher/show/{id}',[
        'as' => 'amw.publisher.show',
        'uses'=> 'RnCAmwController@showPublisher'
    ]);

    Route::any('amw/publisher/edit/{id}',[
        'as' => 'amw.publisher.edit',
        'uses'=> 'RnCAmwController@editPublisher'
    ]);

    Route::any('amw/publisher/update/{id}',[
        'as' => 'amw.publisher.update',
        'uses'=> 'RnCAmwController@updatePublisher'
    ]);

    Route::any('amw/publisher/delete/{id}',[
        'as' => 'amw.publisher.delete',
        'uses'=> 'RnCAmwController@deletePublisher'
    ]);

    Route::any('amw/publisher/batch-delete',[
        'as' => 'amw.publisher.batch-delete',
        'uses'=> 'RnCAmwController@batchDeletPublisher'
    ]);

    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/research-paper/index',[
        'as' => 'amw.research-paper.index',
        'uses'=> 'RnCAmwController@indexResearchPaper'
    ]);

    Route::any('amw/research-paper/save',[
        'as' => 'amw.research-paper.save',
        'uses'=> 'RnCAmwController@storeResearchPaper'
    ]);

    Route::any('amw/research-paper/view/{id}',[
        'as' => 'amw.research-paper.view',
        'uses'=> 'RnCAmwController@viewResearchPaper'
    ]);

    Route::any('amw/research-paper/edit/{id}',[
        'as' => 'amw.research-paper.edit',
        'uses'=> 'RnCAmwController@editResearchPaper'
    ]);

    Route::any('amw/research-paper/update/{id}', [
        'as' => 'amw.research-paper.update',
        'uses' => 'RnCAmwController@updateResearchPaper'
    ]);

    Route::any('amw/research-paper/delete/{id}',[
        'as' => 'amw.research-paper.delete',
        'uses' => 'RnCAmwController@deleteResearchPaper'
    ]);

    Route::any('amw/research-paper/batch-delete/{id}', [
        'as' => 'amw.research-paper.batch-delete',
        'uses' => 'RnCAmwController@batchdeleteResearchPaper'
    ]);

    Route::any('amw/research-paper/download/{rnc_id}',[
        'as' =>'amw.research-paper.download',
        'uses' => 'RnCAmwController@researchPaperDownload'
    ]);

    Route::any('amw/research-paper/read/{rnc_id}',[
        'as' =>'amw.research-paper.read',
        'uses' => 'RnCAmwController@researchPaperRead'
    ]);

    Route::any('amw/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'amw.research-paper.comment',
        'uses' => 'RnCAmwController@researchPaperComment'
    ]);

    Route::any('amw/research-paper/save-comment',[
        'as' =>'amw.research-paper.save-comment',
        'uses' => 'RnCAmwController@saveComment'
    ]);





    //Writer . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('amw/research-paper-writer/index/{rnc_r_p_id}',[
        'as' =>'amw.research-paper-writer.index',
        'uses' => 'RnCAmwController@indexRnCWriter'
    ]);

    Route::any("ajax/get-writer-name-auto-complete", [
        "as"   => "ajax.get-writer-name-auto-complete",
        "uses" => "RnCAmwController@ajaxGetWriterNameAutoComplete"
    ]);

    Route::any('amw/research-paper-writer/store',[
        'as' => 'amw.research-paper-writer.store',
        'uses'=> 'RnCAmwController@storeRnCWriter'
    ]);

    Route::any('amw/research-paper-writer/show/{id}',[
        'as' => 'amw.research-paper-writer.show',
        'uses'=> 'RnCAmwController@showRnCWriter'
    ]);

    Route::any('amw/research-paper-writer/edit/{id}',[
        'as' => 'amw.research-paper-writer.edit',
        'uses'=> 'RnCAmwController@editRnCWriter'
    ]);

    Route::any('amw/research-paper-writer/update/{id}',[
        'as' => 'amw.research-paper-writer.update',
        'uses'=> 'RnCAmwController@updateRnCWriter'
    ]);

    Route::any('amw/research-paper-writer/delete/{id}',[
        'as' => 'amw.research-paper-writer.delete',
        'uses'=> 'RnCAmwController@deleteRnCWriter'
    ]);

    Route::any('amw/research-paper-writer/batch-delete',[
        'as' => 'amw.research-paper-writer.batch-delete',
        'uses'=> 'RnCAmwController@batchDeleteRnCWriter'
    ]);

    // Beneficial

    Route::any('amw/research-paper-beneficial/index/{rnc_r_p_id}/{w_id}',[
        'as' =>'amw.research-paper-beneficial.index',
        'uses' => 'RnCAmwController@indexRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/store',[
        'as' => 'amw.research-paper-beneficial.store',
        'uses'=> 'RnCAmwController@storeRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/show/{id}',[
        'as' => 'amw.research-paper-beneficial.show',
        'uses'=> 'RnCAmwController@showRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/edit/{id}',[
        'as' => 'amw.research-paper-beneficial.edit',
        'uses'=> 'RnCAmwController@editRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/update/{id}',[
        'as' => 'amw.research-paper-beneficial.update',
        'uses'=> 'RnCAmwController@updateRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/delete/{id}',[
        'as' => 'amw.research-paper-beneficial.delete',
        'uses'=> 'RnCAmwController@deleteRnCBeneficial'
    ]);

    Route::any('amw/research-paper-beneficial/batch-delete',[
        'as' => 'amw.research-paper-beneficial.batch-delete',
        'uses'=> 'RnCAmwController@batchDeleteRnCBeneficial'
    ]);





});

