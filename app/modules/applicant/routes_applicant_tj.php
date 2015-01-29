<?php


Route::any('applicant','ApplicantController@index');

Route::any('applicant/store','ApplicantController@store');

Route::any('applicant/delete/{id}','ApplicantController@destroy');

//Route::any('roletask/delete/{id}','RoleTaskController@destroy');

Route::any('applicant/edit/{id}','ApplicantController@edit');

Route::post('applicant/update/{id}','ApplicantController@update');

Route::get('applicant/show/{id}', 'ApplicantController@show' );

