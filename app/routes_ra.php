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
Route::any('years/show','YearsController@show');
Route::get('years/edit/{id}','YearsController@edit_semester');
Route::any('years/update/{id}', ['as' => 'semester.update','uses' => 'YearsController@update_semester' ]);
Route::get('years/delete/{id}','YearsController@delete_semester');
Route::any('batch/delete','YearsController@batchdelete');