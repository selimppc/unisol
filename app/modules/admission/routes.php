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
Tanin
==================================================================
*/

include("routes_tjt.php");



// ----------------------------Public : Admission Test starts----------------------------------------------------------

Route::any('admission_test/amw/dashboard', [
    'as' => 'admission_test.amw.dashboard',
    'uses' => 'AdmAmwController@admAmwDashboard'
]);

Route::any('admission_test/amw/index',[
    'as' => 'admission_test.amw.index',
    'uses' => 'AdmAmwController@admissionTestIndex'
]);

Route::any('admission_test/amw/examiners/{year_id}/{semester_id}/{degree_id}', [
    'as' => 'admission_test.amw.examiners',
    'uses' => 'AdmAmwController@examiners'
]);

Route::any('admission_test/amw/view_examiners/{id}', [
    'as' => 'admission_test.amw.view_examiners',
    'uses' => 'AdmAmwController@viewExaminers'
]);


Route::any('admission_test/amw/store_examiners', [
    'as' => 'admission_test.amw.store_examiners',
    'uses' => 'AdmAmwController@storeExaminers'
]);

Route::any('admission_test/amw/search-index', [
    'as' => 'admission_test.amw.search_index',
    'uses' => 'AdmAmwController@searchIndex'
]);

Route::any('admission_test/amw/question_paper/{year_id}/{semester_id}/{degree_id}', [
    'as' => 'admission_test.amw.question_paper',
    'uses' => 'AdmAmwController@questionPaper'
]);


Route::any('admission_test/amw/store_question_paper', [
    'as' => 'admission_test.amw.store_question_paper',
    'uses' => 'AdmAmwController@storeQuestionPaper'
]);

Route::any('admission_test/amw/view_question_paper', [
    'as' => 'admission_test.amw.view_question_paper',
    'uses' => 'AdmAmwController@viewQuestionPaper'
]);