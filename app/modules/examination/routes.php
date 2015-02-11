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

//include("routes_sh.php");

//Route::any('amw/course/show/{course_id}',[
//    'as' => 'coursefind.show',
//    'uses'=> 'MarkdistributionController@find_course_info'
//]);

//amw
Route::any('examination/amw/index','ExmAmwController@index');
Route::any('examination/amw/storeQuestionPaper','ExmAmwController@storeQuestionPaper');

Route::any('examination/amw/viewQuestion/{id}', [
           'as' => 'examination.amw.viewQuestion',
           'uses' => 'ExmAmwController@viewQuestion'
]);

Route::any('examination/amw/create','ExmAmwController@createQuestionPaper');
Route::any('examination/amw/store','ExmAmwController@storeQuestionPaper');

Route::any('examination/amw/assignto','ExmAmwController@assignTo');

Route::any('examination/amw/editQuestionPaper/{id}', [
           'as' => 'examination.amw.editQuestionPaper',
           'uses' => 'ExmAmwController@editQuestionPaper'
]);

Route::any('examination/amw/updateQuestionPaper/{id}', [
           'as' => 'examination.amw.updateQuestionPaper',
           'uses' => 'ExmAmwController@updateQuestionPaper' ]);

Route::any('examination/amw/questionList','ExmAmwController@questionList');

Route::any('examination/amw/viewQuestionItems/{id}', [
           'as' => 'examination.amw.viewQuestionItems',
           'uses' => 'ExmAmwController@viewQuestionItems' ]);