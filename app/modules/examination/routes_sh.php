<?php

//examination
Route::get('examination/index','ExaminationController@index');
Route::get('examination/create','ExaminationController@create');

//enrollment
Route::get('enrollment/index','ExmEnrollmentController@index');

Route::get('enrollment/create','ExmEnrollmentController@create');


//generate certificate
Route::get('generate_certificate/index','ExmGenerateCertificateController@index');

Route::get('generate_certificate/create','ExmGenerateCertificateController@create');


//manage examination center
Route::get('manage_examination_center/index','ExmManageExaminationCenterController@index');

Route::get('manage_examination_center/create','ExmManageExaminationCenterController@create');


//manage examiner
Route::get('manage_examiner/index','ExmManageExaminerController@index');

Route::get('manage_examiner/create','ExmManageExaminerController@create');


//prepare question paper
Route::get('prepare_question_paper/index','ExmPrepareQuestionPaperController@index');

Route::get('prepare_question_paper/create','ExmPrepareQuestionPaperController@create');


//prepare tabulation
Route::get('prepare_tabulation/index','ExmPrepareTabulationController@index');

Route::get('prepare_tabulation/create','ExmPrepareTabulationController@create');

