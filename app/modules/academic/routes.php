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
Ratna
==================================================================
*/
include("routes_academic_ra.php");

Route::any("academic/faculty", [
    "as"   => "academic/faculty",
    "uses" => "AcmFacultyController@index"
]);

Route::any("academic/faculty/create", [
    "as"   => "academic/faculty/create",
    "uses" => "AcmFacultyController@create"
]);


