<?php
//Subject
Route::get('create/subject','SubjectController@Index');
Route::post('subject/save','SubjectController@save');
Route::any('subject/list','SubjectController@show');
Route::any('subject/batch/delete','SubjectController@batchdelete');
Route::get('subject/delete/{id}','SubjectController@delete');
Route::get('subject/editvalue', 'SubjectController@edit');
Route::post('subject/update/{id}', 'SubjectController@update');
// Ends Subject

//Years
Route::get('create/years','YearsController@Index');
Route::post('years/save','YearsController@save');
Route::any('years/list','YearsController@show');
Route::any('years/batch/delete','YearsController@batchdelete');
// Route::get('subject/delete/{id}','SubjectController@delete');
// Route::get('subject/editvalue', 'SubjectController@edit');
// Route::post('subject/update/{id}', 'SubjectController@update');