<?php

//examination
Route::any('examination/index','ExaminationController@index');
Route::any('examination/create','ExaminationController@create');
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
//prepare question paper

Route::any('prepare_question_paper/index','ExmPrepareQuestionPaperController@index');
Route::any('prepare_question_paper/create','ExmPrepareQuestionPaperController@amw_createQuestionPaper');
Route::any('prepare_question_paper/store','ExmPrepareQuestionPaperController@amw_storeQuestionPaper');
Route::any('prepare_question_paper/show/{id}', [ 'as' => 'prepare_question_paper.show', 'uses' => 'ExmPrepareQuestionPaperController@show' ]);
Route::any('prepare_question_paper/edit/{id}', ['as' => 'prepare_question_paper.edit', 'uses' => 'ExmPrepareQuestionPaperController@edit' ]);

Route::any('prepare_question_paper/destroy/{id}', ['as' => 'prepare_question_paper.destroy', 'uses' => 'ExmPrepareQuestionPaperController@destroy' ]);
Route::any('prepare_question_paper/batchDelete','ExmPrepareQuestionPaperController@batchDelete');

Route::any('prepare_question_paper/faculty_ViewQuestionItems/{id}', [ 'as' => 'prepare_question_paper.faculty_ViewQuestion', 'uses' => 'ExmPrepareQuestionPaperController@faculty_ViewQuestion' ]);

// AMW Part
Route::any('prepare_question_paper/amw_index','ExmPrepareQuestionPaperController@amw_index');
Route::any('prepare_question_paper/amw_ViewQuestion/{id}', [ 'as' => 'prepare_question_paper.amw_ViewQuestion', 'uses' => 'ExmPrepareQuestionPaperController@amw_ViewQuestion' ]);
Route::any('prepare_question_paper/amw_QuestionList','ExmPrepareQuestionPaperController@amw_QuestionList');
Route::any('prepare_question_paper/amw_editQuestionPaper/{id}', ['as' => 'prepare_question_paper.amw_editQuestionPaper', 'uses' => 'ExmPrepareQuestionPaperController@amw_editQuestionPaper' ]);

Route::any('prepare_question_paper/amw_updateQuestionPaper/{id}', ['as' => 'prepare_question_paper.amw_updateQuestionPaper','uses' => 'ExmPrepareQuestionPaperController@amw_updateQuestionPaper' ]);

Route::any('prepare_question_paper/assignto','ExmPrepareQuestionPaperController@assignTo');

// question item View
Route::any('prepare_question_paper/amw_ViewQuestionItems/{id}', [ 'as' => 'prepare_question_paper.amw_ViewQuestionItems', 'uses' => 'ExmPrepareQuestionPaperController@amw_ViewQuestionItems' ]);

// Faculty Part
Route::any('prepare_question_paper/faculty_index','ExmPrepareQuestionPaperController@faculty_index');
Route::any('prepare_question_paper/faculty_ViewQuestion/{id}', [ 'as' => 'prepare_question_paper.faculty_ViewQuestion', 'uses' => 'ExmPrepareQuestionPaperController@faculty_ViewQuestion' ]);
Route::any('prepare_question_paper/faculty_QuestionList','ExmPrepareQuestionPaperController@faculty_QuestionList');


Route::any('prepare_question_paper/faculty_add_question_items/{qid}', ['as' => 'prepare_question_paper.faculty_add_question_items', 'uses' => 'ExmPrepareQuestionPaperController@faculty_add_question_items'] );
Route::any('prepare_question_paper/faculty_store_Question_Items','ExmPrepareQuestionPaperController@faculty_storeQuestionItems');

Route::any('prepare_question_paper/faculty_EditQuestionItems/{id}', ['as' => 'prepare_question_paper.editQuestionItems', 'uses' => 'ExmPrepareQuestionPaperController@faculty_EditQuestionItems' ]);
Route::any('prepare_question_paper/faculty_updateQuestionItems/{id}', ['as' => 'prepare_question_paper.updateQuestionItems','uses' => 'ExmPrepareQuestionPaperController@faculty_updateQuestionItems' ]);

// question item View
Route::any('prepare_question_paper/faculty_ViewQuestionItems/{id}', [ 'as' => 'prepare_question_paper.faculty_ViewQuestionItems', 'uses' => 'ExmPrepareQuestionPaperController@faculty_ViewQuestionItems' ]);






