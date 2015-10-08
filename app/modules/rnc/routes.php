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

    //Route for Faculty User

    //Config. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
    Route::any('faculty/config/index',[
        'as' => 'faculty.config.index',
        'uses'=> 'RncFacultyController@indexConfig'
    ]);

    Route::any('faculty/config/add/{id}',[
        'as' => 'faculty.config.add',
        'uses'=> 'RncFacultyController@addConfig'
    ]);

    Route::any('faculty/config/store',[
        'as' => 'faculty.config.store',
        'uses'=> 'RncFacultyController@storeConfig'
    ]);

    Route::any('faculty/config/show/{id}',[
        'as' => 'faculty.config.show',
        'uses'=> 'RncFacultyController@showConfig'
    ]);

    Route::any('faculty/config/edit/{id}',[
        'as' => 'faculty.config.edit',
        'uses'=> 'RncFacultyController@editConfig'
    ]);

    Route::any('faculty/config/update/{id}',[
        'as' => 'faculty.config.update',
        'uses'=> 'RncFacultyController@updateConfig'
    ]);

    Route::any('faculty/config/delete/{id}',[
        'as' => 'faculty.config.delete',
        'uses'=> 'RncFacultyController@deleteConfig'
    ]);

    Route::any('faculty/config/batch-delete',[
        'as' => 'faculty.config.batch-delete',
        'uses'=> 'RncFacultyController@batchDeletConfig'
    ]);

    //Research Paper . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

    Route::any('faculty/research-paper/index',[
        'as' => 'faculty.research-paper.index',
        'uses'=> 'RncFacultyController@indexResearchPaper'
    ]);

    Route::any('faculty/research-paper/save',[
        'as' => 'faculty.research-paper.save',
        'uses'=> 'RncFacultyController@storeResearchPaper'
    ]);

    Route::any('faculty/research-paper/view/{id}',[
        'as' => 'faculty.research-paper.view',
        'uses'=> 'RncFacultyController@viewResearchPaper'
    ]);

    Route::any('faculty/research-paper/edit/{id}',[
        'as' => 'faculty.research-paper.edit',
        'uses'=> 'RncFacultyController@editResearchPaper'
    ]);

    Route::any('faculty/research-paper/update/{id}', [
        'as' => 'faculty.research-paper.update',
        'uses' => 'RncFacultyController@updateResearchPaper'
    ]);

    Route::any('faculty/research-paper/delete/{id}',[
        'as' => 'faculty.research-paper.delete',
        'uses' => 'RncFacultyController@deleteResearchPaper'
    ]);

    Route::any('faculty/research-paper/batch-delete/{id}', [
        'as' => 'faculty.research-paper.batch-delete',
        'uses' => 'RncFacultyController@batchdeleteResearchPaper'
    ]);

    Route::any('faculty/research-paper/download/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.download',
        'uses' => 'RncFacultyController@researchPaperDownload'
    ]);

    Route::any('faculty/research-paper/purchased-download/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.purchased-download',
        'uses' => 'RncFacultyController@purchasedResearchPaperDownload'
    ]);

    Route::any('faculty/research-paper/read/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.read',
        'uses' => 'RncFacultyController@researchPaperRead'
    ]);

    Route::any('faculty/research-paper/comment/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper.comment',
        'uses' => 'RncFacultyController@researchPaperComment'
    ]);

    Route::any('faculty/research-paper/save-comment',[
        'as' =>'faculty.research-paper.save-comment',
        'uses' => 'RncFacultyController@saveComment'
    ]);

    Route::any('faculty/research-paper/add-to-cart/{rnc_rp_id}',[
        'as' =>'faculty.research-paper.add-to-cart',
        'uses' => 'RncFacultyController@addRPToFacultyCart'
    ]);

    Route::any('faculty/research-paper/remove-from-cart/{id}',[
        'as' =>'faculty.research-paper.remove-from-cart',
        'uses' => 'RncFacultyController@removeRPFromCart'
    ]);

    Route::any('faculty/research-paper/view-cart',[
        'as' =>'faculty.research-paper.view-cart',
        'uses' => 'RncFacultyController@viewRPCart'
    ]);

    Route::any('faculty/research-paper/payment',[
        'as' =>'faculty.research-paper.payment',
        'uses' => 'RncFacultyController@paymentMethodRP'
    ]);

    Route::any('faculty/research-paper/send-info-to-transaction',[
        'as' =>'faculty.research-paper.send-info-to-transaction',
        'uses' => 'RncFacultyController@saveInfoToTransactionTable'
    ]);

    Route::any('faculty/research-paper/my-item',[
        'as' =>'faculty.research-paper.my-item',
        'uses' => 'RncFacultyController@myRP'
    ]);

//new

    Route::any('faculty/research-paper-writer-beneficial/list/{rnc_r_p_id}',[
        'as' =>'faculty.research-paper-writer-beneficial.list',
        'uses' => 'RncFacultyController@listWriterBeneficial'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/store-writer-beneficial', [
        'as'   => 'faculty.research-paper-writer-beneficial.store-writer-beneficial',
        'uses' => 'RncFacultyController@store_writer_beneficial'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/ajax-delete-req-detail', [
        'as'   => 'faculty.research-paper-writer-beneficial.ajax-delete-req-detail',
        'uses' => 'RncFacultyController@fac_ajax_delete_req_detail'
    ]);

    Route::any('faculty/research-paper-writer-beneficial/update',[
        'as' => 'faculty.research-paper-writer-beneficial.update',
        'uses'=> 'RncFacultyController@updateWriterBeneficial'
    ]);

    Route::any("ajax/fac-get-writer-name-auto-complete", [
        "as"   => "ajax.fac-get-writer-name-auto-complete",
        "uses" => "RncFacultyController@ajaxGetWriterNameAutoComplete"
    ]);

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






});

