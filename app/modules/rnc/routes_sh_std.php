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
        'uses'=> 'RncStudentController@indexConfig'
    ]);

    Route::any('student/config/add/{id}',[
        'as' => 'student.config.add',
        'uses'=> 'RncStudentController@addConfig'
    ]);

    Route::any('student/config/store',[
        'as' => 'student.config.store',
        'uses'=> 'RncStudentController@storeConfig'
    ]);

    Route::any('student/config/show/{id}',[
        'as' => 'student.config.show',
        'uses'=> 'RncStudentController@showConfig'
    ]);

    Route::any('student/config/edit/{id}',[
        'as' => 'student.config.edit',
        'uses'=> 'RncStudentController@editConfig'
    ]);

    Route::any('student/config/update/{id}',[
        'as' => 'student.config.update',
        'uses'=> 'RncStudentController@updateConfig'
    ]);

    Route::any('student/config/delete/{id}',[
        'as' => 'student.config.delete',
        'uses'=> 'RncStudentController@deleteConfig'
    ]);

    Route::any('student/config/batch-delete',[
        'as' => 'student.config.batch-delete',
        'uses'=> 'RncStudentController@batchDeleteConfig'
    ]);


    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('student/research-paper/index',[
        'as' => 'student.research-paper.index',
        'uses'=> 'RncStudentController@indexResearchPaper'
    ]);

    Route::any('student/research-paper/save',[
        'as' => 'student.research-paper.save',
        'uses'=> 'RncStudentController@storeResearchPaper'
    ]);

    Route::any('student/research-paper/view/{id}',[
        'as' => 'student.research-paper.view',
        'uses'=> 'RncStudentController@viewResearchPaper'
    ]);

    Route::any('student/research-paper/edit/{id}',[
        'as' => 'student.research-paper.edit',
        'uses'=> 'RncStudentController@editResearchPaper'
    ]);

    Route::any('student/research-paper/update/{id}', [
        'as' => 'student.research-paper.update',
        'uses' => 'RncStudentController@updateResearchPaper'
    ]);

    Route::any('student/research-paper/delete/{id}',[
        'as' => 'student.research-paper.delete',
        'uses' => 'RncStudentController@deleteResearchPaper'
    ]);

    Route::any('student/research-paper/batch-delete/{id}', [
        'as' => 'student.research-paper.batch-delete',
        'uses' => 'RncStudentController@batchdeleteResearchPaper'
    ]);

    Route::any('student/research-paper/download/{rnc_rp_id}',[
        'as' =>'student.research-paper.download',
        'uses' => 'RncStudentController@researchPaperDownload'
    ]);

    Route::any('student/research-paper/purchased-download/{rnc_rp_id}',[
        'as' =>'student.research-paper.purchased-download',
        'uses' => 'RncStudentController@purchasedResearchPaperDownload'
    ]);

    Route::any('student/research-paper/read/{rnc_rp_id}',[
        'as' =>'student.research-paper.read',
        'uses' => 'RncStudentController@researchPaperRead'
    ]);

    Route::any('student/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'student.research-paper.comment',
        'uses' => 'RncStudentController@researchPaperComment'
    ]);

    Route::any('student/research-paper/save-comment',[
        'as' =>'student.research-paper.save-comment',
        'uses' => 'RncStudentController@saveComment'
    ]);

    Route::any('student/research-paper/add-to-cart/{rnc_rp_id}',[
        'as' =>'student.research-paper.add-to-cart',
        'uses' => 'RncStudentController@addRPToStudentCart'
    ]);

    Route::any('student/research-paper/remove-from-cart/{id}',[
        'as' =>'student.research-paper.remove-from-cart',
        'uses' => 'RncStudentController@removeRPFromCart'
    ]);

    Route::any('student/research-paper/view-cart',[
        'as' =>'student.research-paper.view-cart',
        'uses' => 'RncStudentController@viewRPCart'
    ]);

    Route::any('student/research-paper/payment',[
        'as' =>'student.research-paper.payment',
        'uses' => 'RncStudentController@paymentMethodRP'
    ]);

    Route::any('student/research-paper/send-info-to-transaction',[
        'as' =>'student.research-paper.send-info-to-transaction',
        'uses' => 'RncStudentController@saveInfoToTransactionTable'
    ]);

    Route::any('student/research-paper/my-item',[
        'as' =>'student.research-paper.my-item',
        'uses' => 'RncStudentController@myRP'
    ]);


    //new

    Route::any('student/research-paper-writer-beneficial/list/{rnc_r_p_id}',[
        'as' =>'student.research-paper-writer-beneficial.list',
        'uses' => 'RncFacultyController@listWriterBeneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/store-writer-beneficial', [
        'as'   => 'student.research-paper-writer-beneficial.store-writer-beneficial',
        'uses' => 'RncFacultyController@store_writer_beneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/ajax-delete-req-detail', [
        'as'   => 'student.research-paper-writer-beneficial.ajax-delete-req-detail',
        'uses' => 'RncStudentController@fac_ajax_delete_req_detail'
    ]);

    Route::any('student/research-paper-writer-beneficial/edit/{rnc_r_p_id}/{id}/{ben_id}',[
        'as' => 'student.research-paper-writer-beneficial.edit',
        'uses'=> 'RncStudentController@editWriterBeneficial'
    ]);

    Route::any('student/research-paper-writer-beneficial/update',[
        'as' => 'student.research-paper-writer-beneficial.update',
        'uses'=> 'RncStudentController@updateWriterBeneficial'
    ]);

    Route::any("ajax/std-get-writer-name-auto-complete", [
        "as"   => "ajax.std-get-writer-name-auto-complete",
        "uses" => "RncStudentController@ajaxGetWriterNameAutoComplete"
    ]);