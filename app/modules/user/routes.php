<?php

Route::any("user/login", [
    "as"   => "user/login",
    "uses" => "UserController@login"
]);



Route::group(["after" => "auth"], function() {

    Route::any("user/logout", [
        "as"   => "user/logout",
        "uses" => "UserController@logout"
    ]);

    Route::any("user/dashboard", [
        "as"   => "user/dashboard",
        "uses" => "UserController@userDashboard"
    ]);

    Route::any("user/profile", [
        "as"   => "user/profile",
        "uses" => "UserProfileController@profile"
    ]);

    Route::any("user/user-access-to", [
        "as"   => "user/user-access-to",
        "uses" => "UserController@userAccessTo"
    ]);

    Route::any("user/amw-dashboard", [
        "as"   => "user/amw-dashboard",
        "uses" => "UserDashboardController@amwDashboard"
    ]);

    Route::any("user/faculty-dashboard", [
        "as"   => "user/faculty-dashboard",
        "uses" => "UserDashboardController@facultyDashboard"
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


