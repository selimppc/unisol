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

Route::any('login', 'UserSignupController@Login');

Route::any('users/login', 'UserSignupController@UserLogin');

Route::any('users/logout', 'UserSignupController@usersLogout');

Route::any('dashboard', 'UserSignupController@Dashboard');



