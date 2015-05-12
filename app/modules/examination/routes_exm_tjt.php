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

Route::any('examination/amw/exam-list',[
    'as' =>'examination.amw.exam-list',
    'uses' => 'ExmAmwController@examList'
]);

Route::any('examination/amw/create-exam',[
    'as' =>'examination.amw.create-exam',
    'uses' => 'ExmAmwController@createExamination'
]);

Route::any('examination/amw/store-exam',[
    'as' =>'examination.amw.store-exam',
    'uses' => 'ExmAmwController@storeExamination'
]);

Route::any('examination/amw/drop-down-courses',[
    'as' =>'examination.amw.drop-down-courses',
    'uses' => 'ExmAmwController@dropDownCourses'
]);

Route::any('examination/amw/view-exam-data/{id}', [
    'as' => 'examination.amw.view-exam-data',
    'uses' => 'ExmAmwController@viewExamData'
]);

Route::any('examination/amw/edit-exam-data/{id}', [
    'as' => 'examination.amw.edit-exam-data',
    'uses' => 'ExmAmwController@editExamData'
]);
Route::any('examination/amw/update-exam-data/{id}', [
    'as' => 'examination.amw.update-exam-data',
    'uses' => 'ExmAmwController@updateExamData'
]);

Route::any('examination/amw/delete-exam-data/{id}', [
    'as' => 'examination.amw.delete-exam-data',
    'uses' => 'ExmAmwController@deleteExamData'
]);



