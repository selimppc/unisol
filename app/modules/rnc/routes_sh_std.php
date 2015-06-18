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

//Route for Student User

    //Config. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    Route::any('student/config/index',[
        'as' => 'student.config.index',
        'uses'=> 'RnCStudentController@indexConfig'
    ]);

    Route::any('student/config/add/{id}',[
        'as' => 'student.config.add',
        'uses'=> 'RnCStudentController@addConfig'
    ]);

    Route::any('student/config/store',[
        'as' => 'student.config.store',
        'uses'=> 'RnCStudentController@storeConfig'
    ]);

    Route::any('student/config/show/{id}',[
        'as' => 'student.config.show',
        'uses'=> 'RnCStudentController@showConfig'
    ]);

    Route::any('student/config/edit/{id}',[
        'as' => 'student.config.edit',
        'uses'=> 'RnCStudentController@editConfig'
    ]);

    Route::any('student/config/update/{id}',[
        'as' => 'student.config.update',
        'uses'=> 'RnCStudentController@updateConfig'
    ]);

    Route::any('student/config/delete/{id}',[
        'as' => 'student.config.delete',
        'uses'=> 'RnCStudentController@deleteConfig'
    ]);

    Route::any('student/config/batch-delete',[
        'as' => 'student.config.batch-delete',
        'uses'=> 'RnCStudentController@batchDeletConfig'
    ]);


    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('student/research-paper/index',[
        'as' => 'student.research-paper.index',
        'uses'=> 'RnCStudentController@indexResearchPaper'
    ]);

    Route::any('student/research-paper/save',[
        'as' => 'student.research-paper.save',
        'uses'=> 'RnCStudentController@storeResearchPaper'
    ]);

    Route::any('student/research-paper/view/{id}',[
        'as' => 'student.research-paper.view',
        'uses'=> 'RnCStudentController@viewResearchPaper'
    ]);

    Route::any('student/research-paper/edit/{id}',[
        'as' => 'student.research-paper.edit',
        'uses'=> 'RnCStudentController@editResearchPaper'
    ]);

    Route::any('student/research-paper/update/{id}', [
        'as' => 'student.research-paper.update',
        'uses' => 'RnCStudentController@updateResearchPaper'
    ]);

    Route::any('student/research-paper/delete/{id}',[
        'as' => 'student.research-paper.delete',
        'uses' => 'RnCStudentController@deleteResearchPaper'
    ]);

    Route::any('student/research-paper/batch-delete/{id}', [
        'as' => 'student.research-paper.batch-delete',
        'uses' => 'RnCStudentController@batchdeleteResearchPaper'
    ]);

    Route::any('student/research-paper/download/{rnc_rp_id}',[
        'as' =>'student.research-paper.download',
        'uses' => 'RnCStudentController@researchPaperDownload'
    ]);

    Route::any('student/research-paper/purchased-download/{rnc_rp_id}',[
        'as' =>'student.research-paper.purchased-download',
        'uses' => 'RnCStudentController@purchasedResearchPaperDownload'
    ]);

    Route::any('student/research-paper/read/{rnc_rp_id}',[
        'as' =>'student.research-paper.read',
        'uses' => 'RnCStudentController@researchPaperRead'
    ]);

    Route::any('student/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'student.research-paper.comment',
        'uses' => 'RnCStudentController@researchPaperComment'
    ]);

    Route::any('student/research-paper/save-comment',[
        'as' =>'student.research-paper.save-comment',
        'uses' => 'RnCStudentController@saveComment'
    ]);

    Route::any('student/research-paper/add-to-cart/{rnc_rp_id}',[
        'as' =>'student.research-paper.add-to-cart',
        'uses' => 'RnCStudentController@addRPToStudentCart'
    ]);

    Route::any('student/research-paper/remove-from-cart/{id}',[
        'as' =>'student.research-paper.remove-from-cart',
        'uses' => 'RnCStudentController@removeRPFromCart'
    ]);

    Route::any('student/research-paper/view-cart',[
        'as' =>'student.research-paper.view-cart',
        'uses' => 'RnCStudentController@viewRPCart'
    ]);

    Route::any('student/research-paper/payment',[
        'as' =>'student.research-paper.payment',
        'uses' => 'RnCStudentController@paymentMethodRP'
    ]);

    Route::any('student/research-paper/send-info-to-transaction',[
        'as' =>'student.research-paper.send-info-to-transaction',
        'uses' => 'RnCStudentController@saveInfoToTransactionTable'
    ]);

    Route::any('student/research-paper/my-item',[
        'as' =>'student.research-paper.my-item',
        'uses' => 'RnCStudentController@myRP'
    ]);


    //new

    Route::any('student/research-paper-writer-beneficial/list/{rnc_r_p_id}',[
        'as' =>'student.research-paper-writer-beneficial.list',
        'uses' => 'RnCFacultyController@listWriterBeneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/store-writer-beneficial', [
        'as'   => 'student.research-paper-writer-beneficial.store-writer-beneficial',
        'uses' => 'RnCFacultyController@store_writer_beneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/ajax-delete-req-detail', [
        'as'   => 'student.research-paper-writer-beneficial.ajax-delete-req-detail',
        'uses' => 'RnCStudentController@fac_ajax_delete_req_detail'
    ]);



    Route::any('student/research-paper-writer-beneficial/edit/{rnc_r_p_id}/{id}/{ben_id}',[
        'as' => 'student.research-paper-writer-beneficial.edit',
        'uses'=> 'RnCStudentController@editWriterBeneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/update',[
        'as' => 'student.research-paper-writer-beneficial.update',
        'uses'=> 'RnCStudentController@updateWriterBeneficial'
    ]);

    //Writer . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('student/research-paper-writer/index/{rnc_r_p_id}',[
        'as' =>'student.research-paper-writer.index',
        'uses' => 'RnCStudentController@indexRnCWriter'
    ]);

    Route::any("ajax/get-writer-name-auto-complete", [
        "as"   => "ajax.get-writer-name-auto-complete",
        "uses" => "RnCStudentController@ajaxGetWriterNameAutoComplete"
    ]);

    Route::any('student/research-paper-writer/store',[
        'as' => 'student.research-paper-writer.store',
        'uses'=> 'RnCStudentController@storeRnCWriter'
    ]);

    Route::any('student/research-paper-writer/show/{id}',[
        'as' => 'student.research-paper-writer.show',
        'uses'=> 'RnCStudentController@showRnCWriter'
    ]);

    Route::any('student/research-paper-writer/edit/{id}',[
        'as' => 'student.research-paper-writer.edit',
        'uses'=> 'RnCStudentController@editRnCWriter'
    ]);

    Route::any('student/research-paper-writer/update/{id}',[
        'as' => 'student.research-paper-writer.update',
        'uses'=> 'RnCStudentController@updateRnCWriter'
    ]);

    Route::any('student/research-paper-writer/delete/{id}',[
        'as' => 'student.research-paper-writer.delete',
        'uses'=> 'RnCStudentController@deleteRnCWriter'
    ]);

    Route::any('student/research-paper-writer/batch-delete',[
        'as' => 'student.research-paper-writer.batch-delete',
        'uses'=> 'RnCStudentController@batchDeleteRnCWriter'
    ]);

    // Beneficial

    Route::any('student/research-paper-beneficial/index/{id}/{rnc_r_p_id}/{w_id}',[
        'as' =>'student.research-paper-beneficial.index',
        'uses' => 'RnCStudentController@indexRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/store',[
        'as' => 'student.research-paper-beneficial.store',
        'uses'=> 'RnCStudentController@storeRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/show/{id}',[
        'as' => 'student.research-paper-beneficial.show',
        'uses'=> 'RnCStudentController@showRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/edit/{id}',[
        'as' => 'student.research-paper-beneficial.edit',
        'uses'=> 'RnCStudentController@editRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/update/{id}',[
        'as' => 'student.research-paper-beneficial.update',
        'uses'=> 'RnCStudentController@updateRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/delete/{id}',[
        'as' => 'student.research-paper-beneficial.delete',
        'uses'=> 'RnCStudentController@deleteRnCBeneficial'
    ]);

    Route::any('student/research-paper-beneficial/batch-delete',[
        'as' => 'student.research-paper-beneficial.batch-delete',
        'uses'=> 'RnCStudentController@batchDeleteRnCBeneficial'
    ]);