<?php
//User Profile
Route::any("user/profile-info", [
    "as"   => "user/profile-info",
    "uses" => "UserInformationController@profileIndex"
]);

Route::any("user/profile-info/store", [
    "as"   => "user/profile-info/store",
    "uses" => "UserInformationController@storeProfile"
]);

Route::any("user/profile-info/edit/{id}", [
    "as"   => "user/profile-info/edit",
    "uses" => "UserInformationController@editUserProfile"
]);

Route::any("user/profile-info/update/{id}", [
    "as"   => "user/profile-info/update",
    "uses" => "UserInformationController@updateProfile"
]);

Route::any("user/profile-info/edit/profile-image/{id}", [
    "as"   => "user/profile-info/edit/profile-image",
    "uses" => "UserInformationController@editProfileImage"
]);

Route::any("user/profile-info/change/profile-image/{id}", [
    "as"   => "user/profile-info/change/profile-image",
    "uses" => "UserInformationController@updateProfileImage"
]);

//user mete data

Route::any("user/meta-data", [
    "as"   => "user/meta-data",
    "uses" => "UserInformationController@metaDataIndex"
]);

