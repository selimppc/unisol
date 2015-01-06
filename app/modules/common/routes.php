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