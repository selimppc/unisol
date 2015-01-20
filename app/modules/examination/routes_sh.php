<?php


//examination
Route::any('examination/index','ExaminationController@index');
Route::any('examination/create','ExaminationController@create');

//prepare question paper
Route::any('prepare_question_paper/index','ExmPrepareQuestionPaperController@index');

Route::any('prepare_question_paper/amw_index','ExmPrepareQuestionPaperController@amw_index');

Route::any('prepare_question_paper/faculty_index','ExmPrepareQuestionPaperController@faculty_index');





Route::any('prepare_question_paper/create','ExmPrepareQuestionPaperController@createQuestionPaper');
Route::any('prepare_question_paper/store','ExmPrepareQuestionPaperController@storeQuestionPaper');
Route::any('prepare_question_paper/show/{id}', [ 'as' => 'prepare_question_paper.show', 'uses' => 'ExmPrepareQuestionPaperController@show' ]);
Route::any('prepare_question_paper/edit/{id}', ['as' => 'prepare_question_paper.edit', 'uses' => 'ExmPrepareQuestionPaperController@edit' ]);
Route::any('prepare_question_paper/update/{id}', ['as' => 'prepare_question_paper.update','uses' => 'ExmPrepareQuestionPaperController@update' ]);
Route::any('prepare_question_paper/destroy/{id}', ['as' => 'prepare_question_paper.destroy', 'uses' => 'ExmPrepareQuestionPaperController@destroy' ]);
Route::any('prepare_question_paper/batchDelete','ExmPrepareQuestionPaperController@batchDelete');

Route::any('prepare_question_paper/ViewQuestion','ExmPrepareQuestionPaperController@ViewQuestion');


//enrollment
Route::any('enrollment/index','ExmEnrollmentController@index');

Route::any('enrollment/create','ExmEnrollmentController@create');


//generate certificate
Route::any('generate_certificate/index','ExmGenerateCertificateController@index');

Route::any('generate_certificate/create','ExmGenerateCertificateController@create');


//manage examination center
Route::get('manage_examination_center/index','ExmManageExaminationCenterController@index');

Route::any('manage_examination_center/create','ExmManageExaminationCenterController@create');


//manage examiner
Route::get('manage_examiner/index','ExmManageExaminerController@index');

Route::any('manage_examiner/create','ExmManageExaminerController@create');





//prepare tabulation
Route::get('prepare_tabulation/index','ExmPrepareTabulationController@index');

Route::any('prepare_tabulation/create','ExmPrepareTabulationController@create');

