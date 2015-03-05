<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2015
 * Time: 10:16 AM
 */


Route::get('user','UserSignupController@Userindex');

Route::any('user/store','UserSignupController@Userstore');

Route::post('send/email', 'UserSignupController@send_users_email');

Route::get('register/verify/{verified_code}','UserSignupController@confirm');

Route::any('usersign/login', 'UserSignupController@Login');

Route::any('users/login', 'UserSignupController@UserLogin');

Route::any('usersign/logout', 'UserSignupController@usersLogout');

Route::any('usersign/dashboard', 'UserSignupController@Dashboard');

//forgot password

Route::any('/password_reset', 'UserSignupController@userPassword');

Route::any('/password_reset_mail', 'UserSignupController@userPasswordResetMail');

Route::any('password_reset_confirm/{reset_password_token}','UserSignupController@userPasswordResetConfirm');

Route::any('users/password_reset', 'UserSignupController@userPasswordReset'); //password reset view

Route::any('users/user_password_update', 'UserSignupController@userPasswordUpdate'); // password reset action

//forgot username..........
Route::any('user/username_reset', 'UserSignupController@usernameReset');

Route::any('user/username_reset_mail', 'UserSignupController@usernameResetMail');

//reset password
Route::any('user/reset_password', 'UserSignupController@userResetPassword');

Route::any('user/reset_password_update', 'UserSignupController@userResetPasswordUpdate');

//Cookie
Route::any('user/set_cookie', 'UserSignupController@setCookie');

Route::any('user/get_cookie', 'UserSignupController@getCookie');


//-------------------------------- Amw: Course Management starts-----------------------------------------------

Route::any('amw/course_manage','AdmAmwController@index');
Route::any('back','AdmAmwController@back');

Route::any('course_manage/create','AdmAmwController@create');

Route::any('course_manage/store','AdmAmwController@store');

Route::any('course_manage/show/{id}','AdmAmwController@show');

Route::any('course_manage/edit/{id}','AdmAmwController@edit');

Route::any('course_manage/update/{id}','AdmAmwController@update');

Route::any('course_manage/search','AdmAmwController@search');

Route::any('course_manage/search_view','AdmAmwController@cmSearchView');

//------------------------------ Amw : Degree Management starts  --------------------------------------------

Route::any('amw/degree_manage','AdmAmwController@dgmIndex');

Route::any('degree_manage/create','AdmAmwController@dgmCreate');

//Route::any('degree_manage/store','AdmAmwController@dgmStore');

Route::any('degree_manage/store', ['as' => 'degree_manage.store','uses' => 'AdmAmwController@dgmStore']);

Route::any('degree_manage/show/{id}', ['as' => 'degree_manage.show','uses' => 'AdmAmwController@dgmShow']);

Route::any('degree_manage/edit/{id}', ['as' => 'degree_manage.edit','uses' => 'AdmAmwController@dgmEdit']);

Route::any('degree_manage/update/{id}', ['as' => 'degree_manage.update','uses' => 'AdmAmwController@dgmUpdate']);

//------------------------------Amw : Degree - Waiver starts  --------------------------------------------

Route::any('amw/degree_manage/waiver/{id}', [
    'as' => 'degree_manage.waiver',
    'uses' => 'AdmAmwController@degreeWaiverIndex']);


Route::any('amw/degree_waiver/create/{degree_id}', [
    'as' => 'degree_waiver.create',
    'uses' => 'AdmAmwController@degreeWaiverCreate'
]);

Route::any('amw/degree_waiver/store', [
    'as' => 'degree_waiver.store',
    'uses' => 'AdmAmwController@degreeWaiverStore'
]);

Route::any('amw/degree_waiver/delete/{id}', [
    'as' => 'degree_waiver.delete',
    'uses' => 'AdmAmwController@degreeWaiverDelete'
]);

Route::any('amw/degree_waiver/delete/{id}','AdmAmwController@degreeWaiverDelete');

Route::any('amw/degree_manage/waiver_const/{id}', [
    'as' => 'degree_manage.waiver_const',
    'uses' => 'AdmAmwController@degWaiverConstIndex']);

//Time dependent

Route::any('amw/degree_manage/waiver_const/create/{degree_waiver_id}', [
    'as' => 'deg_waiver_time_const.create',
    'uses' => 'AdmAmwController@degWaiverTimeConstCreate'
]);

Route::any('amw/degree_manage/const/store', [
    'as' => 'deg_waiver_const.store',
    'uses' => 'AdmAmwController@degWaiverConstStore'
]);

Route::any('amw/degree_manage/waiver_const/edit/{id}', [
    'as' => 'deg_waiver_time_const.edit',
    'uses' => 'AdmAmwController@degWaiverTimeConstEdit'
]);

Route::post('amw/degree_manage/waiver_const/update/{id}', [
    'as' => 'deg_waiver_const.update',
    'uses' => 'AdmAmwController@degWaiverConstUpdate'
]);

//GPA dependent
Route::any('amw/degree_manage/gpa_const/create/{id}', [
    'as' => 'deg_waiver_gpa_const.create',
    'uses' => 'AdmAmwController@degWaiverGpaConstCreate'
]);

Route::any('amw/degree_manage/gpa_const/edit/{id}', [
    'as' => 'deg_waiver_gpa_const.edit',
    'uses' => 'AdmAmwController@degWaiverGpaConstEdit'
]);

Route::any('amw/degree_manage/waiver_const/delete/{id}','AdmAmwController@degWaiverConstDelete');

//--------------------------------  Amw : Waiver Management starts  --------------------------------------------

Route::any('amw/waiver_manage', ['as' => 'waiver_manage.index','uses' => 'AdmAmwController@waiverIndex']);

Route::any('amw/waiver_manage/create', ['as' => 'waiver_manage.create','uses' => 'AdmAmwController@waiverCreate']);

Route::any('amw/waiver_manage/store', ['as' => 'waiver_manage.store','uses' => 'AdmAmwController@waiverStore']);


Route::any('amw/waiver_manage/show/{id}', ['as' => 'waiver_manage.show','uses' => 'AdmAmwController@waiverShow']);

Route::any('amw/waiver_manage/edit/{id}', ['as' => 'waiver_manage.edit','uses' => 'AdmAmwController@waiverEdit']);

Route::any('amw/waiver_manage/update/{id}', ['as' => 'waiver_manage.update','uses' => 'AdmAmwController@waiverUpdate']);

// ----------------------------Public : Admission starts----------------------------------------------------------

Route::any('public/admission',
                ['as' => 'admission.index',
                 'uses' => 'AdmPublicController@admIndex']);

Route::any('public/admission/degree_details/{id}',
        ['as' => 'admission.degree_details',
        'uses' => 'AdmPublicController@admDegreeApplicantDetails']);

Route::any('public/admission/degree_save',
    ['as' => 'admission.degree_save',
        'uses' => 'AdmPublicController@admDegreeAptSave']);

Route::any('public/admission/apt_details/{id}',
    ['as' => 'admission.apt_details',
        'uses' => 'AdmPublicController@admAptDetails']);

Route::any('public/admission/adm_test_details/{id}',
    ['as' => 'admission.adm_test_details',
        'uses' => 'AdmPublicController@admTestDetails']);





















