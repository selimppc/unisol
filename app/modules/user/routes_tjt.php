<?php
//User Profile
//Route::any("user/profile-info", [
//    "as"   => "user/profile-info",
//    "uses" => "UserInformationController@profileIndex"
//]);

Route::any("user/profile-info/store", [
    "as"   => "user/profile-info/store",
    "uses" => "UserInformationController@storeProfile"
]);

Route::any("user/edit/profile-info/{id}", [
    "as"   => "user/edit/profile-info",
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

Route::any("user/meta-data/create", [
    "as"   => "user/meta-data/create",
    "uses" => "UserInformationController@createMetaData"
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

Route::any("user/meta-data/signature/{id}", [
    "as"   => "user/meta-data/signature",
    "uses" => "UserInformationController@viewSignature"
]);

Route::any("user/meta-data/add/add-signature/{id}", [
    "as"   => "user/meta-data/add-signature",
    "uses" => "UserInformationController@addSignature"
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

//Extra-Curricular Activities
Route::any("user/extra-curricular", [
    "as"   => "user/extra-curricular",
    "uses" => "UserInformationController@extraCurricularIndex"
]);

Route::any("user/extra-curricular/store", [
    "as"   => "user/extra-curricular/store",
    "uses" => "UserInformationController@extraCurricularStore"
]);

Route::any("user/extra-curricular/edit/{id}", [
    "as"   => "user/extra-curricular/edit",
    "uses" => "UserInformationController@editExtraCurricular"
]);

Route::any("user/extra-curricular/update/{id}", [
    "as"   => "user/extra-curricular/update",
    "uses" => "UserInformationController@updateExtraCurricular"
]);

Route::any("user/extra-curricular/certificate-medal/{id}", [
    "as"   => "user/extra-curricular/certificate-medal",
    "uses" => "UserInformationController@viewCertificateMedal"
]);

//Supporting Docs..

Route::any("user/supporting-docs", [
    "as"   => "user/supporting-docs",
    "uses" => "UserInformationController@indexSDocs"
]);

Route::any('user/supporting_docs/create/{doc_type}/{sdoc_id}', [
    'as'   => 'user.supporting_docs.create',
    'uses' => 'UserInformationController@supportingDocs'
]);

Route::any("user/supporting-docs/store", [
    "as"   => "user/supporting-docs.store",
    "uses" => "UserInformationController@sDocsStore"
]);

//Settings............
Route::any("user/settings", [
    "as"   => "user/settings",
    "uses" => "UserInformationController@user_settings"
]);

//change password
Route::any('user/reset_password/{id}',
    ['as'=>'user/reset_password',
        'uses'=>'UserInformationController@password_change_view']);

Route::any('user/change_password/{id}',
    ['as'=>'user/change_password',
        'uses'=>'UserInformationController@change_password']);
//Route::any('user/change_password', 'UserInformationController@change_password');



