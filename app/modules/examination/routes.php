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

include("routes_sh.php");

//Route::any('',[
//    'as' =>'',
//    'uses' => ''
//]);



Route::any('examination/amw/deshboard', [
    'as' => 'examination.amw.deshboard',
    'uses' => 'ExmAmwController@deshboard'
]);

Route::any('examination/amw/examination',[
    'as' =>'examination/amw/examination',
    'uses' => 'ExmAmwController@examination'
]);

Route::any('examination/amw/createExamination',[
    'as' =>'examination/amw/createExamination',
    'uses' => 'ExmAmwController@createExamination'
]);

Route::any('examination/amw/storeExamination',[
    'as' =>'examination/amw/storeExamination',
    'uses' => 'ExmAmwController@storeExamination'
]);

Route::any('examination/amw/viewExamination/{id}', [
    'as' => 'examination.amw.viewExamination',
    'uses' => 'ExmAmwController@viewExamination'
]);
Route::any('examination/amw/editExamination/{exam_list_id}', [
    'as' => 'examination.amw.editExamination',
    'uses' => 'ExmAmwController@editExamination'
]);
Route::any('examination/amw/updateExamination/{exam_list_id}', [
    'as' => 'examination.amw.updateExamination',
    'uses' => 'ExmAmwController@updateExamination'
]);

Route::any('examination/amw/courses/{mark_dist_item_id}',[
    'as' =>'examination/amw/courses',
    'uses' => 'ExmAmwController@courses'
]);

Route::any('examination/amw/examiners',[
    'as' =>'examination/amw/examiners',
    'uses' => 'ExmAmwController@examiners'
]);

Route::any('examination/amw/addExaminers',[
    'as' =>'examination/amw/addExaminers',
    'uses' => 'ExmAmwController@addExaminers'
]);

Route::any('examination/amw/storeExaminers',[
    'as' =>'examination/amw/storeExaminers',
    'uses' => 'ExmAmwController@storeExaminers'
]);

Route::any('examination/amw/viewExaminers/{id}', [
    'as' => 'examination.amw.viewExaminers',
    'uses' => 'ExmAmwController@viewExaminers'
]);

Route::any('examination/amw/questionItemsList/{exm_question_id}',[
    'as' =>'examination/amw/questionItemsList',
    'uses' => 'ExmAmwController@questionsItemShow'
]);

Route::any('examination/amw/index/{exam_list_id}',[
    'as' => 'examination/amw/index',
    'uses' => 'ExmAmwController@index'
]);

Route::any('examination/amw/viewExaminers/{id}', [
    'as' => 'examination.amw.viewExaminers',
    'uses' => 'ExmAmwController@viewExaminers'
]);

Route::any('examination/amw/search', [
    'as' => 'examination.amw.search',
    'uses' => 'ExmAmwController@search'
]);

//Route::any('',[
//    'as' =>'',
//    'uses' => ''
//]);
