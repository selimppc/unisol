<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2015
 * Time: 10:16 AM
 */




Route::get('user','UserSignupController@Userindex');


Route::any('user/store','UserSignupController@Userstore');

