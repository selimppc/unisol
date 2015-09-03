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
// User Signup....
Route::any("user-signup", [
    "as"   => "user-signup",
    "uses" => "UserSignupController@Userindex"
]);

Route::any("user/store", [
    "as"   => "user/store",
    "uses" => "UserSignupController@Userstore"
]);
Route::post('send/email', 'UserSignupController@send_users_email');
Route::get('register/verify/{verified_code}','UserSignupController@confirm');

//forgot password
Route::any('user/forgot-password',
       ['as'=>'user/forgot-password',
           'uses'=>'UserSignupController@forgot_password']);

Route::any('user/password_reminder_mail',
    ['as'=>'user/password_reminder_mail',
        'uses'=>'UserSignupController@user_password_reminder_mail']);

Route::any('password_reset_confirm/{reset_password_token}','UserSignupController@userPasswordResetConfirm');
Route::any('users/password_reset', 'UserSignupController@userPasswordReset'); //password reset view
Route::any('users/user_password_update', 'UserSignupController@userPasswordUpdate'); // password reset action

//forgot username..........
Route::any('user/username_reset', 'UserSignupController@usernameReset');
Route::any('user/username_reset_mail', 'UserSignupController@usernameResetMail');


//change password

Route::any('user/reset_password/{id}',
    ['as'=>'user/reset_password',
        'uses'=>'UserInformationController@password_change_view']);

Route::any('user/change_password/{id}',
    ['as'=>'user/change_password',
        'uses'=>'UserInformationController@change_password']);

//Profile.........

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

//user mete data........

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
//Academic Records
Route::any("user/acm-records/create", [
    "as"   => "user/acm-records/create",
    "uses" => "UserInformationController@create_acm_records"
]);

Route::any("user/acm-records/store", [
    "as"   => "user/acm-records/store",
    "uses" => "UserInformationController@store_acm_records"
]);

Route::any("user/acm-records/edit/{id}", [
    "as"   => "user/acm-records/edit",
    "uses" => "UserInformationController@edit_acm_records"
]);

Route::any("user/acm-records/update/{id}", [
    "as"   => "user/acm-records/update",
    "uses" => "UserInformationController@update_acm_records"
]);
Route::any("user/acm-records/certificate/{id}", [
    "as"   => "user/acm-records/certificate",
    "uses" => "UserInformationController@view_certificate"
]);
Route::any("user/acm-records/transcript/{id}", [
    "as"   => "user/acm-records/transcript",
    "uses" => "UserInformationController@view_transcript"
]);

Route::any("user/acm-records/delete/{id}", [
    "as"   => "user/acm-records/delete",
    "uses" => "UserInformationController@delete_acm_records"
]);

Route::any("user/others-info", [
    "as"   => "user/others-info",
    "uses" => "UserInformationController@others_info"
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



