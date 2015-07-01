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

Route::any('work-week',[
    'as' =>'work-week',
    'uses' => 'HrWorkWeekController@index'
]);

Route::any('work-week/store',[
    'as' =>'work-week.store',
    'uses' => 'HrWorkWeekController@store'
]);

Route::any('work-week/show/{id}',[
    'as' =>'work-week.show',
    'uses' => 'HrWorkWeekController@showWorkWeek'
]);

Route::any('work-week/edit/{id}',[
    'as' =>'work-week.edit',
    'uses' => 'HrWorkWeekController@editWorkWeek'
]);

Route::any('work-week/update/{id}',[
    'as' =>'work-week.update',
    'uses' => 'HrWorkWeekController@updateWorkWeek'
]);

Route::any('work-week/delete/{id}',[
    'as' =>'work-week.delete',
    'uses' => 'HrWorkWeekController@deleteWorkWeek'
]);

Route::any('work-week/batch-delete',[
    'as' =>'work-week.batch-delete',
    'uses' => 'HrWorkWeekController@batchDelete'
]);

//Leave Type

Route::any('leave-type',[
    'as' =>'leave-type',
    'uses' => 'HrLeaveTypeController@index'
]);

Route::any('leave-type/store',[
    'as' =>'leave-type.store',
    'uses' => 'HrLeaveTypeController@storeLeaveType'
]);

Route::any('leave-type/show/{id}',[
    'as' =>'leave-type.show',
    'uses' => 'HrLeaveTypeController@showLeaveType'
]);

Route::any('leave-type/edit/{id}',[
    'as' =>'leave-type.edit',
    'uses' => 'HrLeaveTypeController@editLeaveType'
]);

Route::any('leave-type/update/{id}',[
    'as' =>'leave-type.update',
    'uses' => 'HrLeaveTypeController@updateLeaveType'
]);

Route::any('leave-type/delete/{id}',[
    'as' =>'leave-type.delete',
    'uses' => 'HrLeaveTypeController@deleteLeaveType'
]);

Route::any('leave-type/batch-delete',[
    'as' =>'leave-type.batch-delete',
    'uses' => 'HrLeaveTypeController@batchDelete'
]);

//leave comments

Route::any('leave',[
    'as' =>'leave',
    'uses' => 'HrLeaveController@index'
]);

Route::any('leave/store',[
    'as' =>'leave.store',
    'uses' => 'HrLeaveController@storeLeave'
]);

Route::any('leave-comments/show/{id}',[
    'as' =>'leave-comments.show',
    'uses' => 'HrLeaveController@showLeave'
]);

Route::any('leave-comments/edit/{id}',[
    'as' =>'leave-comments.edit',
    'uses' => 'HrLeaveController@editLeave'
]);

Route::any('leave-comments/update/{id}',[
    'as' =>'leave-comments.update',
    'uses' => 'HrLeaveController@updateLeave'
]);

Route::any('leave-comments/delete/{id}',[
    'as' =>'leave-comments.delete',
    'uses' => 'HrLeaveCommentsController@deleteLeaveComments'
]);

Route::any('leave-comments/batch-delete',[
    'as' =>'leave-comments.batch-delete',
    'uses' => 'HrLeaveCommentsController@batchDelete'
]);




