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

//Route for Faculty User

    //Config. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    Route::any('faculty/config/index',[
        'as' => 'faculty.config.index',
        'uses'=> 'RnCFacultyController@indexConfig'
    ]);

    Route::any('faculty/config/add/{id}',[
        'as' => 'faculty.config.add',
        'uses'=> 'RnCFacultyController@addConfig'
    ]);

    Route::any('faculty/config/store',[
        'as' => 'faculty.config.store',
        'uses'=> 'RnCFacultyController@storeConfig'
    ]);

    Route::any('faculty/config/show/{id}',[
        'as' => 'faculty.config.show',
        'uses'=> 'RnCFacultyController@showConfig'
    ]);

    Route::any('faculty/config/edit/{id}',[
        'as' => 'faculty.config.edit',
        'uses'=> 'RnCFacultyController@editConfig'
    ]);

    Route::any('faculty/config/update/{id}',[
        'as' => 'faculty.config.update',
        'uses'=> 'RnCFacultyController@updateConfig'
    ]);

    Route::any('faculty/config/delete/{id}',[
        'as' => 'faculty.config.delete',
        'uses'=> 'RnCFacultyController@deleteConfig'
    ]);

    Route::any('faculty/config/batch-delete',[
        'as' => 'faculty.config.batch-delete',
        'uses'=> 'RnCFacultyController@batchDeletConfig'
    ]);

    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/research-paper/index',[
        'as' => 'faculty.research-paper.index',
        'uses'=> 'RnCFacultyController@indexResearchPaper'
    ]);

    Route::any('faculty/research-paper/save',[
        'as' => 'faculty.research-paper.save',
        'uses'=> 'RnCFacultyController@storeResearchPaper'
    ]);

    Route::any('faculty/research-paper/view/{id}',[
        'as' => 'faculty.research-paper.view',
        'uses'=> 'RnCFacultyController@viewResearchPaper'
    ]);

    Route::any('faculty/research-paper/edit/{id}',[
        'as' => 'faculty.research-paper.edit',
        'uses'=> 'RnCFacultyController@editResearchPaper'
    ]);

    Route::any('faculty/research-paper/update/{id}', [
        'as' => 'faculty.research-paper.update',
        'uses' => 'RnCFacultyController@updateResearchPaper'
    ]);

    Route::any('faculty/research-paper/delete/{id}',[
        'as' => 'faculty.research-paper.delete',
        'uses' => 'RnCFacultyController@deleteResearchPaper'
    ]);

    Route::any('faculty/research-paper/batch-delete/{id}', [
        'as' => 'faculty.research-paper.batch-delete',
        'uses' => 'RnCFacultyController@batchdeleteResearchPaper'
    ]);

    Route::any('faculty/research-paper/download/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.download',
        'uses' => 'RnCFacultyController@researchPaperDownload'
    ]);

    Route::any('faculty/research-paper/purchased-download/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.purchased-download',
        'uses' => 'RnCFacultyController@purchasedResearchPaperDownload'
    ]);

    Route::any('faculty/research-paper/read/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.read',
        'uses' => 'RnCFacultyController@researchPaperRead'
    ]);

    Route::any('faculty/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper.comment',
        'uses' => 'RnCFacultyController@researchPaperComment'
    ]);

    Route::any('faculty/research-paper/save-comment',[
        'as' =>'faculty.research-paper.save-comment',
        'uses' => 'RnCFacultyController@saveComment'
    ]);

    Route::any('faculty/research-paper/add-to-cart/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.add-to-cart',
        'uses' => 'RnCFacultyController@addRPToFacultyCart'
    ]);

    Route::any('faculty/research-paper/remove-from-cart/{id}',[
        'as' =>'faculty.research-paper.remove-from-cart',
        'uses' => 'RnCFacultyController@removeRPFromCart'
    ]);

    Route::any('faculty/research-paper/view-cart',[
        'as' =>'faculty.research-paper.view-cart',
        'uses' => 'RnCFacultyController@viewRPCart'
    ]);

    Route::any('faculty/research-paper/payment',[
        'as' =>'faculty.research-paper.payment',
        'uses' => 'RnCFacultyController@paymentMethodRP'
    ]);

    Route::any('faculty/research-paper/send-info-to-transaction',[
        'as' =>'faculty.research-paper.send-info-to-transaction',
        'uses' => 'RnCFacultyController@saveInfoToTransactionTable'
    ]);

    Route::any('faculty/research-paper/my-item',[
        'as' =>'faculty.research-paper.my-item',
        'uses' => 'RnCFacultyController@myRP'
    ]);



//new

    Route::any('faculty/research-paper-writer-beneficial/list/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper-writer-beneficial.list',
        'uses' => 'RnCFacultyController@listWriterBeneficial'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/store-writer-beneficial', [
        'as'   => 'faculty.research-paper-writer-beneficial.store-writer-beneficial',
        'uses' => 'RnCFacultyController@store_writer_beneficial'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/ajax-delete-req-detail', [
        'as'   => 'faculty.research-paper-writer-beneficial.ajax-delete-req-detail',
        'uses' => 'RnCFacultyController@fac_ajax_delete_req_detail'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/update',[
        'as' => 'faculty.research-paper-writer-beneficial.update',
        'uses'=> 'RnCFacultyController@updateWriterBeneficial'
    ]);


    //Writer . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/research-paper-writer/index/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper-writer.index',
        'uses' => 'RnCFacultyController@indexRnCWriter'
    ]);

    Route::any("ajax/fac-get-writer-name-auto-complete", [
        "as"   => "ajax.fac-get-writer-name-auto-complete",
        "uses" => "RnCFacultyController@ajaxFacGetWriterNameAutoComplete"
    ]);

    Route::any('faculty/research-paper-writer/store',[
        'as' => 'faculty.research-paper-writer.store',
        'uses'=> 'RnCFacultyController@storeRnCWriter'
    ]);

    Route::any('faculty/research-paper-writer/show/{id}',[
        'as' => 'faculty.research-paper-writer.show',
        'uses'=> 'RnCFacultyController@showRnCWriter'
    ]);

    Route::any('faculty/research-paper-writer/edit/{id}',[
        'as' => 'faculty.research-paper-writer.edit',
        'uses'=> 'RnCFacultyController@editRnCWriter'
    ]);

    Route::any('faculty/research-paper-writer/update/{id}',[
        'as' => 'faculty.research-paper-writer.update',
        'uses'=> 'RnCFacultyController@updateRnCWriter'
    ]);

    Route::any('faculty/research-paper-writer/delete/{id}',[
        'as' => 'faculty.research-paper-writer.delete',
        'uses'=> 'RnCFacultyController@deleteRnCWriter'
    ]);

    Route::any('faculty/research-paper-writer/batch-delete',[
        'as' => 'faculty.research-paper-writer.batch-delete',
        'uses'=> 'RnCFacultyController@batchDeleteRnCWriter'
    ]);

    // Beneficial

    Route::any('faculty/research-paper-beneficial/index/{id}/{rnc_r_p_id}/{w_id}',[
        'as' =>'faculty.research-paper-beneficial.index',
        'uses' => 'RnCFacultyController@indexRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/store',[
        'as' => 'faculty.research-paper-beneficial.store',
        'uses'=> 'RnCFacultyController@storeRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/show/{id}',[
        'as' => 'faculty.research-paper-beneficial.show',
        'uses'=> 'RnCFacultyController@showRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/edit/{id}',[
        'as' => 'faculty.research-paper-beneficial.edit',
        'uses'=> 'RnCFacultyController@editRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/update/{id}',[
        'as' => 'faculty.research-paper-beneficial.update',
        'uses'=> 'RnCFacultyController@updateRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/delete/{id}',[
        'as' => 'faculty.research-paper-beneficial.delete',
        'uses'=> 'RnCFacultyController@deleteRnCBeneficial'
    ]);

    Route::any('faculty/research-paper-beneficial/batch-delete',[
        'as' => 'faculty.research-paper-beneficial.batch-delete',
        'uses'=> 'RnCFacultyController@batchDeleteRnCBeneficial'
    ]);