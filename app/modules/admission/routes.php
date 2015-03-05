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

Route::any('amw/admission_test/deshboard', [
    'as' => 'amw.admission_test.deshboard',
    'uses' => 'AdmAmwController@deshboard'
]);

Route::any('amw/admission_test/index',[
    'as' => 'amw.admission_test.index',
    'uses' => 'AdmAmwController@admissionTestIndex'
]);

Route::any('amw/admission_test/examiners/{year_id}/{semester_id}/{degree_id}', [
    'as' => 'amw.admission_test.examiners',
    'uses' => 'AdmAmwController@examiners'
]);

Route::any('amw/admission_test/search-index', [
    'as' => 'amw.admission_test.search_index',
    'uses' => 'AdmAmwController@searchIndex'
]);



Route::any('amw/admission_test/question_paper/{year_id}/{semester_id}', [
    'as' => 'amw.admission_test.question_paper',
    'uses' => 'AdmAmwController@questionPaper'
]);





