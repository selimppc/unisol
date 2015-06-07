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
    //Category. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('student/category/index',[
        'as' => 'student.category.index',
        'uses'=> 'RnCStudentController@indexCategory'
    ]);

    Route::any('student/category/add/{id}',[
        'as' => 'student.category.add',
        'uses'=> 'RnCStudentController@addCategory'
    ]);

    Route::any('student/category/store',[
        'as' => 'student.category.store',
        'uses'=> 'RnCStudentController@storeCategory'
    ]);

    Route::any('student/category/show/{id}',[
        'as' => 'student.category.show',
        'uses'=> 'RnCStudentController@showCategory'
    ]);

    Route::any('student/category/edit/{id}',[
        'as' => 'student.category.edit',
        'uses'=> 'RnCStudentController@editCategory'
    ]);

    Route::any('student/category/update/{id}',[
        'as' => 'student.category.update',
        'uses'=> 'RnCStudentController@updateCategory'
    ]);

    Route::any('student/category/delete/{id}',[
        'as' => 'student.category.delete',
        'uses'=> 'RnCStudentController@deleteCategory'
    ]);

    Route::any('student/category/batch-delete',[
        'as' => 'student.category.batch-delete',
        'uses'=> 'RnCStudentController@batchDeleteCategory'
    ]);

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

    //Publisher. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('student/publisher/index',[
        'as' => 'student.publisher.index',
        'uses'=> 'RnCStudentController@indexPublisher'
    ]);

    Route::any('student/publisher/add/{id}',[
        'as' => 'student.publisher.add',
        'uses'=> 'RnCStudentController@addPublisher'
    ]);

    Route::any('student/publisher/store',[
        'as' => 'student.publisher.store',
        'uses'=> 'RnCStudentController@storePublisher'
    ]);

    Route::any('student/publisher/show/{id}',[
        'as' => 'student.publisher.show',
        'uses'=> 'RnCStudentController@showPublisher'
    ]);

    Route::any('student/publisher/edit/{id}',[
        'as' => 'student.publisher.edit',
        'uses'=> 'RnCStudentController@editPublisher'
    ]);

    Route::any('student/publisher/update/{id}',[
        'as' => 'student.publisher.update',
        'uses'=> 'RnCStudentController@updatePublisher'
    ]);

    Route::any('student/publisher/delete/{id}',[
        'as' => 'student.publisher.delete',
        'uses'=> 'RnCStudentController@deletePublisher'
    ]);

    Route::any('student/publisher/batch-delete',[
        'as' => 'student.publisher.batch-delete',
        'uses'=> 'RnCStudentController@batchDeletPublisher'
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

    Route::any('student/research-paper/download/{rnc_id}',[
        'as' =>'student.research-paper.download',
        'uses' => 'RnCStudentController@researchPaperDownload'
    ]);

    Route::any('student/research-paper/read/{rnc_id}',[
        'as' =>'student.research-paper.read',
        'uses' => 'RnCStudentController@researchPaperRead'
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

    Route::any('student/research-paper-beneficial/index/{rnc_r_p_id}/{w_id}',[
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