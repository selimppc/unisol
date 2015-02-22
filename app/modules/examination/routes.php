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


Route::any('examination/amw/deshboard','ExmAmwController@deshboard');

Route::any('examination/amw/examination','ExmAmwController@examination');
Route::any('examination/amw/createExamination','ExmAmwController@createExamination');
Route::any('examination/amw/storeExamination','ExmAmwController@storeExamination');
Route::any('examination/amw/viewExamination/{id}', [
    'as' => 'examination.amw.viewExamination',
    'uses' => 'ExmAmwController@viewExamination'
]);
Route::any('examination/amw/editExamination/{id}', [
    'as' => 'examination.amw.editExamination',
    'uses' => 'ExmAmwController@editExamination'
]);
Route::any('examination/amw/updateExamination/{id}', [
    'as' => 'examination.amw.updateExamination',
    'uses' => 'ExmAmwController@updateExamination'
]);


Route::any('examination/amw/courses/{mark_dist_item_id}','ExmAmwController@courses');

Route::any('examination/amw/examiners','ExmAmwController@examiners');
Route::any('examination/amw/addExaminers','ExmAmwController@addExaminers');

Route::any('examination/amw/storeExaminers','ExmAmwController@storeExaminers');
Route::any('examination/amw/viewExaminers/{id}', [
    'as' => 'examination.amw.viewExaminers',
    'uses' => 'ExmAmwController@viewExaminers'
]);

