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

Route::any("api/", [
    "as"   => "api",
    "uses" => "ApiController@index"
]);


Route::any("api/gauth/{auth?}", [
    "as"   => "api.google.auth",
    "uses" => "ApiController@google_login"
]);


Route::any("api/google/logout", [
    "as"   => "api.google.logout",
    "uses" => "ApiController@google_logout"
]);