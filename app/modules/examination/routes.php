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


Route::any('examination/amw/examination','ExmAmwController@examination');

Route::any('examination/amw/viewExamination/{id}', [
    'as' => 'examination.amw.viewExamination',
    'uses' => 'ExmAmwController@viewExamination'
]);

Route::any('examination/amw/editExamination/{id}', [
    'as' => 'examination.amw.editExamination',
    'uses' => 'ExmAmwController@editExamination'
]);