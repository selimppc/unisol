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

Route::any("user/profile-info/profile-image/{id}", [
    "as"   => "user/profile-info/profile-image",
    "uses" => "UserInformationController@profileImage"
]);

Route::any("user/profile-info/add/profile-image/{id}", [
    "as"   => "user/profile-info/add/profile-image",
    "uses" => "UserInformationController@addProfileImage"
]);

//user mete data

Route::any("user/meta-data", [
    "as"   => "user/meta-data",
    "uses" => "UserInformationController@metaDataIndex"
]);

Route::any("user/meta-data/store", [
    "as"   => "user/meta-data/store",
    "uses" => "UserInformationController@storeMetaData"
]);

Route::any("user/meta-data/edit/{id}", [
    "as"   => "user/meta-data/edit",
    "uses" => "UserInformationController@editMetaData"
]);

Route::any("user/meta-data/update/{id}", [
    "as"   => "user/meta-data/update",
    "uses" => "UserInformationController@updateMetaData"
]);

//Miscellaneous_Info

Route::any("user/misc-info", [
    "as"   => "user/misc-info",
    "uses" => "UserInformationController@miscIndex"
]);

Route::any("user/misc-info/store", [
    "as"   => "user/misc-info/store",
    "uses" => "UserInformationController@storeMisc"
]);

Route::any("user/misc-info/edit/{id}", [
    "as"   => "user/misc-info/edit",
    "uses" => "UserInformationController@editMiscInfo"
]);

Route::any("user/misc-info/update/{id}", [
    "as"   => "user/misc-info/update",
    "uses" => "UserInformationController@updateMiscInfo"
]);

