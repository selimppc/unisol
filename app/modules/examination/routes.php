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

/*
==================================================================
Shafi
==================================================================
*/
Route::group(['prefix' => 'examination'], function() {
    include("routes_sh.php");
    include("routes_sh2.php");
    include("routes_exm_tjt.php");


    Route::any('amw/deshboard', [
        'as' => 'examination.amw.deshboard',
        'uses' => 'ExmAmwController@deshboard'
    ]);

    Route::any('amw/search', [
        'as' => 'examination.amw.search',
        'uses' => 'ExmAmwController@search'
    ]);

    //Route::any('',[
    //    'as' =>'',
    //    'uses' => ''
    //]);

//    Route::any('amw/assign_faculty',[
//        'as' =>'examination.amw.assign_faculty',
//        'uses' => 'ExmAmwController@assign_faculty'
//    ]);

//    Route::any('amw/examiners/{year_id}/{semester_id}/{course_management_id}/{acm_marks_dist_item_id}/{exm_exam_list_id}',[
//        'as' =>'examination/amw/examiners',
//        'uses' => 'ExmAmwController@examiners'
//    ]);
//
//    Route::any('amw/get-all-examiners',[
//        'as' =>'examination.amw.get_all_examiners',
//        'uses' => 'ExmAmwController@get_all_examiners'
//    ]);
//
//    Route::any('amw/addExaminers',[
//        'as' =>'examination/amw/addExaminers',
//        'uses' => 'ExmAmwController@addExaminers'
//    ]);
//
//    Route::any('amw/storeExaminers',[
//        'as' =>'examination/amw/storeExaminers',
//        'uses' => 'ExmAmwController@storeExaminers'
//    ]);
//
//    Route::any('amw/viewExaminers/{id}', [
//        'as' => 'examination.amw.viewExaminers',
//        'uses' => 'ExmAmwController@viewExaminers'
//    ]);
//


    //Route::any('examination/amw/storeQuestionPaper','ExmAmwController@storeQuestionPaper');

//    Route::any('amw/viewQuestion/{id}', [
//        'as' => 'examination.amw.viewQuestion',
//        'uses' => 'ExmAmwController@viewQuestion'
//    ]);
//
//    Route::any('amw/create',[
//        'as' =>'examination/amw/create',
//        'uses' => 'ExmAmwController@createQuestionPaper'
//    ]);
//
//
//
//    Route::any('amw/assignto',[
//        'as' =>'examination/amw/assignto',
//        'uses' => 'ExmAmwController@assignTo'
//    ]);
//
//
//    Route::any('amw/questionList',[
//        'as' =>'examination/amw/questionList',
//        'uses' => 'ExmAmwController@questionList'
//    ]);
//
//    Route::any('amw/viewQuestionItems/{id}', [
//        'as' => 'examination.amw.viewQuestionItems',
//        'uses' => 'ExmAmwController@viewQuestionItems'
//    ]);
//
//    Route::any('amw/destroy/{id}', [
//        'as' => 'examination.amw.destroy',
//        'uses' => 'ExmAmwController@destroy'
//    ]);
//
//    Route::any('amw/batchDelete',[
//        'as' =>'examination/amw/batchDelete',
//        'uses' => 'ExmAmwController@batchDelete'
//    ]);
//
//
//    Route::any('amw/batchItemsDelete',[
//        'as' =>'examination/amw/batchItemsDelete',
//        'uses' => 'ExmAmwController@batchItemsDelete'
//    ]);

});