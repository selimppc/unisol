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
Route::any('years/show/{id}',['as' => 'years.show', 'uses'=> 'YearsController@show_one']);
Route::get('years/edit/{id}', ['as' => 'years.edit','uses' => 'YearsController@edit']);
Route::any('years/update/{id}', ['as' => 'years/update','uses' => 'YearsController@update']);
Route::get('years/delete/{id}','YearsController@delete');
Route::any('batch/delete','YearsController@batchdelete');
// End years

// Courses under semester/term
Route::get('create/term','TermUnderSemesterController@Index');
Route::post('term/save','TermUnderSemesterController@save');
Route::any('term/show','TermUnderSemesterController@showterm');
Route::any('term/show/{id}',['as' => 'term.show', 'uses'=> 'TermUnderSemesterController@show_one']);
Route::get('term/edit/{id}', ['as' => 'term.edit','uses' => 'TermUnderSemesterController@edit']);
Route::any('term/update/{id}', ['as' => 'term/update','uses' => 'TermUnderSemesterController@update']);
Route::get('term/delete/{id}','TermUnderSemesterController@delete');
Route::any('term/batch/delete','TermUnderSemesterController@batchdelete');

// End courses