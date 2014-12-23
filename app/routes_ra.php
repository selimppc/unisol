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

//year
Route::get('create/year','YearController@Index');
Route::post('year/save','YearController@save');
Route::any('year/show','YearController@show');
Route::any('year/show/{id}',['as' => 'year.show', 'uses'=> 'YearController@show_one']);
Route::get('year/edit/{id}', ['as' => 'year.edit','uses' => 'YearController@edit']);
Route::any('year/update/{id}', ['as' => 'year/update','uses' => 'yearController@update']);
Route::get('year/delete/{id}','yearController@delete');
Route::any('batch/delete','yearController@batchdelete');
// End year

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
