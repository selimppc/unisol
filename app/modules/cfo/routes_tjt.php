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
//CFO
Route::any('counselling/category',[
    'as' =>'counselling.category',
    'uses' => 'CfoController@index'
]);

/*Route::any('examination/amw/create-exam',[
    'as' =>'examination.amw.create-exam',
    'uses' => 'ExmAmwController@createExamination'
]);

Route::any('amw/store-exam',[
    'as' =>'amw.store-exam',
    'uses' => 'ExmAmwController@storeExamination'
]);

Route::any('amw/drop-down-courses',[
    'as' =>'amw.drop-down-courses',
    'uses' => 'ExmAmwController@createAjaxCourseList'
]);
*/
