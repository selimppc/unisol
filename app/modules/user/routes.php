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

Route::any("user/login", [
    "as"   => "user/login",
    "uses" => "UserController@login"
]);

Route::any("user/logout", [
    "as"   => "user/logout",
    "uses" => "UserController@logout"
]);

Route::any("user/dashboard", [
    "as"   => "user/dashboard",
    "uses" => "UserController@userDashboard"
]);


Route::group(["before" => "auth"], function() {

    Route::any("/profile", [
        "as"   => "user/profile",
        "uses" => "UserController@profile"
    ]);

});

Route::any("/request", [
    "as"   => "user/request",
    "uses" => "UserController@request"
]);

Route::any("/reset/{token}", [
    "as"   => "user/reset",
    "uses" => "UserController@reset"
]);


