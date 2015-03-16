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

//Route::get('admin/common', function() {
//    return '<h1>Hello</h1>
//'; });
//foreach (Config::get('content::channels') as $key => $channel)
//{
//    Route::get('admin/content/' . $key, function() use ($channel) {
//        return "<h1>Channel [{$channel['title']}]</h1>";
//    });
//}

Route::get('admin/common', function() { return '<h1>Hello World !</h1>'; });

Route::get('admin/mon','CommonController@index');

Route::get('/helloworld','FowController@index');

/*
 * Ratna
*/

//*******************Year Start*****************************
Route::any('common/year/',
    'YearController@index'
);
Route::post('year/save',
    'YearController@save'
);
Route::any('year/show/{id}',[
    'as' => 'year.show',
    'uses'=> 'YearController@show_one'
]);
Route::get('year/edit/{id}', [
    'as' => 'year.edit',
    'uses' => 'YearController@edit'
]);
Route::any('year/update/{id}', [
    'as' => 'year/update',
    'uses' => 'YearController@update'
]);
Route::get('year/delete/{id}',
    'YearController@delete'
);
Route::any('batch/delete',
    'YearController@batchdelete'
);
//*****************Semester Start*******************************
Route::get('common/semester/',
    'SemesterController@index'
);
Route::any('semester/store', [
    'as' => 'semester.store',
    'uses' => 'SemesterController@store'
]);
Route::get('semester/show/{id}', [
    'as' => 'semester.show',
    'uses' => 'SemesterController@show'
]);
Route::any('semester/edit/{id}', [
    'as' => 'semester.edit',
    'uses' => 'SemesterController@edit'
]);
Route::any('semester/update/{id}', [
    'as' => 'semester.update',
    'uses' => 'SemesterController@update'
]);
Route::any('semester/destroy/{id}', [
    'as' => 'semester.destroy',
    'uses' => 'SemesterController@destroy'
]);
Route::any('semester/batchDelete',
    'SemesterController@batchDelete'
);
