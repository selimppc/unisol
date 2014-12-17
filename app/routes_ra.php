<?php

Route::get('create/subject','SubjectController@Index');
Route::post('subject/save','SubjectController@save');
Route::any('subject/list','SubjectController@show');
Route::any('subject/batch/delete','SubjectController@batchdelete');
Route::get('subject/delete/{id}','SubjectController@delete');
Route::get('subject/editvalue', 'SubjectController@edit');
Route::post('subject/update/{id}', 'SubjectController@update');