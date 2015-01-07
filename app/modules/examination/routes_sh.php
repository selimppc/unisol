<?php

//examination
Route::get('examination/index','ExaminationController@index');
Route::get('examination/create','ExaminationController@create');

//enrollment
Route::get('enrollment/index','ExmEnrollmentController@index');


//generate certificate
Route::get('generate_certificate/index','ExmGenerateCertificateController@index');


//manage examination center
Route::get('manage_examination_center/index','ExmManageExaminationCenterController@index');


//manage examiner
Route::get('manage_examiner/index','ExmManageExaminerController@index');


//prepare question paper
Route::get('prepare_question_paper/index','ExmPrepareQuestionPaperController@index');


//prepare tabulation
Route::get('prepare_tabulation/index','ExmPrepareTabulationController@index');

