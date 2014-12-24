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

Route::get('/','HomeController@index');


//Route::group(['prefix' => '{lang?}', 'before' => 'localization'], function() {
//    Route::get('/', function() {
//        return View::make('test.localization_test');
//    });
//});


Route::group(['prefix' => '{lang?}','before' => 'localization'], function() {
    Route::get('/', function() {
        return View::make('test.localization_test');
    });
});

