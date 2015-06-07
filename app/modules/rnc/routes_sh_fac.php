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
    //Category. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/category/index',[
        'as' => 'faculty.category.index',
        'uses'=> 'RnCFacultyController@indexCategory'
    ]);

    Route::any('faculty/category/add/{id}',[
        'as' => 'faculty.category.add',
        'uses'=> 'RnCFacultyController@addCategory'
    ]);

    Route::any('faculty/category/store',[
        'as' => 'faculty.category.store',
        'uses'=> 'RnCFacultyController@storeCategory'
    ]);

    Route::any('faculty/category/show/{id}',[
        'as' => 'faculty.category.show',
        'uses'=> 'RnCFacultyController@showCategory'
    ]);

    Route::any('faculty/category/edit/{id}',[
        'as' => 'faculty.category.edit',
        'uses'=> 'RnCFacultyController@editCategory'
    ]);

    Route::any('faculty/category/update/{id}',[
        'as' => 'faculty.category.update',
        'uses'=> 'RnCFacultyController@updateCategory'
    ]);

    Route::any('faculty/category/delete/{id}',[
        'as' => 'faculty.category.delete',
        'uses'=> 'RnCFacultyController@deleteCategory'
    ]);

    Route::any('faculty/category/batch-delete',[
        'as' => 'faculty.category.batch-delete',
        'uses'=> 'RnCFacultyController@batchDeleteCategory'
    ]);

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

    //Publisher. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/publisher/index',[
        'as' => 'faculty.publisher.index',
        'uses'=> 'RnCFacultyController@indexPublisher'
    ]);

    Route::any('faculty/publisher/add/{id}',[
        'as' => 'faculty.publisher.add',
        'uses'=> 'RnCFacultyController@addPublisher'
    ]);

    Route::any('faculty/publisher/store',[
        'as' => 'faculty.publisher.store',
        'uses'=> 'RnCFacultyController@storePublisher'
    ]);

    Route::any('faculty/publisher/show/{id}',[
        'as' => 'faculty.publisher.show',
        'uses'=> 'RnCFacultyController@showPublisher'
    ]);

    Route::any('faculty/publisher/edit/{id}',[
        'as' => 'faculty.publisher.edit',
        'uses'=> 'RnCFacultyController@editPublisher'
    ]);

    Route::any('faculty/publisher/update/{id}',[
        'as' => 'faculty.publisher.update',
        'uses'=> 'RnCFacultyController@updatePublisher'
    ]);

    Route::any('faculty/publisher/delete/{id}',[
        'as' => 'faculty.publisher.delete',
        'uses'=> 'RnCFacultyController@deletePublisher'
    ]);

    Route::any('faculty/publisher/batch-delete',[
        'as' => 'faculty.publisher.batch-delete',
        'uses'=> 'RnCFacultyController@batchDeletPublisher'
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

    Route::any('faculty/research-paper/download/{rnc_id}',[
        'as' =>'faculty.research-paper.download',
        'uses' => 'RnCFacultyController@researchPaperDownload'
    ]);

    Route::any('faculty/research-paper/read/{rnc_id}',[
        'as' =>'faculty.research-paper.read',
        'uses' => 'RnCFacultyController@researchPaperRead'
    ]);

    //Writer . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/research-paper-writer/index/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper-writer.index',
        'uses' => 'RnCFacultyController@indexRnCWriter'
    ]);

    Route::any("ajax/get-writer-name-auto-complete", [
        "as"   => "ajax.get-writer-name-auto-complete",
        "uses" => "RnCFacultyController@ajaxGetWriterNameAutoComplete"
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

    Route::any('faculty/research-paper-beneficial/index/{rnc_r_p_id}/{w_id}',[
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