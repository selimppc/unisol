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

Route::get('register/verify/{confirmation_code}','UserSignupController@confirm');

Route::any('usersign/login', 'UserSignupController@Login');

Route::any('users/login', 'UserSignupController@UserLogin');

Route::any('usersign/logout', 'UserSignupController@usersLogout');

Route::any('usersign/dashboard', 'UserSignupController@Dashboard');

Route::any('/password_reset', 'UserSignupController@userPassword');

Route::any('/password_reset_mail', 'UserSignupController@userPasswordResetMail');

Route::any('password_reset_confirm/{reset_password_token}','UserSignupController@userPasswordResetConfirm');

Route::any('users/get_user_password_update', 'UserSignupController@userPasswordUpdate');

Route::any('users/user_password_update/{reset_password_token}', 'UserSignupController@userPasswordUpdate');



