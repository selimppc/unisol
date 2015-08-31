<?php

include("routes_tjt.php");

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
    Route::any("user/student-dashboard", [
        "as"   => "user/student-dashboard",
        "uses" => "UserDashboardController@studentDashboard"
    ]);
    Route::any("user/librarian-dashboard", [
        "as"   => "user/librarian-dashboard",
        "uses" => "UserDashboardController@librarianDashboard"
    ]);

    Route::any("user/cfo-dashboard", [
        "as"   => "user/cfo-dashboard",
        "uses" => "UserDashboardController@cfoDashboard"
    ]);

    Route::any("user/hr-dashboard", [
        "as"   => "user/hr-dashboard",
        "uses" => "UserDashboardController@hrDashboard"
    ]);

    Route::any("user/employee-dashboard", [
        "as"   => "user/employee-dashboard",
        "uses" => "UserDashboardController@employeeDashboard"
    ]);

    Route::any("user/applicant-dashboard", [
        "as"   => "user/applicant-dashboard",
        "uses" => "UserDashboardController@applicantDashboard"
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

