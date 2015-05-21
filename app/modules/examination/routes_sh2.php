<?php

//FACULTY ROUTE CONFIGURATION :: VERSION 2

Route::any('faculty/examination-list',[
    'as' =>'faculty.examination-list',
    'uses' => 'ExmFacultyController@examinationList'
]);

Route::any('faculty/examination-list/batchDelete',[
    'as' =>'faculty.examination-list.batchDelete',
    'uses' => 'ExmFacultyController@examinationListBatchDelete'
]);

Route::any('faculty/examination-list/change-status-to-deny/{id}',[
    'as' =>'faculty.examination-list.change-status-to-deny',
    'uses' => 'ExmFacultyController@changeStatusToDeny'
]);

Route::any('faculty/examination-list/change-status-to-accept/{id}',[
    'as' =>'faculty.examination-list.change-status-to-accept',
    'uses' => 'ExmFacultyController@changeStatusToAccepted'
]);

Route::any('faculty/examination-list/view-examiner/{id}/{exm_list_id}',[
    'as' =>'faculty.examination-list.view-examiner',
    'uses' => 'ExmFacultyController@viewExaminer'
]);

Route::any('faculty/examination-list/save-examiner-comment',[
    'as' =>'faculty.examination-list.save-examiner-comment',
    'uses' => 'ExmFacultyController@saveExaminerComment'
]);

Route::any('faculty/exm-question-paper/{exm_list_id}',[
    'as' =>'faculty.exm-question-paper',
    'uses' => 'ExmFacultyController@questionPaper'
]);

Route::any('faculty/exm-question-paper/view-exm-question-paper/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.view-exm-question-paper',
    'uses' => 'ExmFacultyController@viewExmQuestionPaper'
]);

//Route::any('faculty/assign-exm-faculty-setter/{e_q_id}',[
//    'as' => 'faculty.assign-exm-faculty-setter',
//    'uses' => 'ExmFacultyController@AssignExmFacultySetter'
//]);
//
//Route::any('faculty/assign-exm-faculty-evaluator/{e_q_id}',[
//    'as' => 'faculty.assign-exm-faculty-evaluator',
//    'uses' => 'ExmFacultyController@AssignExmFacultyEvaluator'
//]);

Route::any('faculty/examination-quest-paper-item/add-exm-quest-paper-item/{exm_question_id}',[
    'as' =>'faculty.examination-quest-paper-item.add-exm-quest-paper-item',
    'uses' => 'ExmFacultyController@addExaminationModuleQuestionPaperItem'
]);

Route::any('faculty/exm-quest-paper-item/store-exm-quest-paper-item',[
    'as' =>'faculty.examination-quest-paper-item.store-exm-quest-paper-item',
    'uses' => 'ExmFacultyController@storeExmQPItem'
]);

Route::any('faculty/exm-question-paper/view-exm-questions-items/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.view-exm-questions-items',
    'uses' => 'ExmFacultyController@viewExmQuestionsItems'
]);

Route::any('faculty/exm-question-papers/specific-exm-question-view/{e_q_i_id}',[
    'as' => 'faculty.exm-question-papers.specific-exm-question-view',
    'uses' => 'ExmFacultyController@viewSpecificExmQuestionItems'
]);

Route::any('faculty/exm-question-papers/specific-exm-question-edit/{e_q_i_id}',[
    'as' => 'faculty.exm-question-papers.specific-exm-question-edit',
    'uses' => 'ExmFacultyController@editSpecificExmQuestionItems'
]);

Route::any('faculty/exm-question-papers/specific-exm-question-update/{e_q_i_id}',[
    'as' => 'faculty.exm-question-papers.specific-exm-question-update',
    'uses' => 'ExmFacultyController@updateSpecificExmQuestionItems'
]);

Route::any('faculty/exm-question-paper/assign-exm-question-comment/{e_q_id}',[
    'as' =>'faculty.exm-question-paper.assign-exm-question-comment',
    'uses' => 'ExmFacultyController@assignExmQuestionPaper'
]);

Route::any('faculty/exm-question-paper/save-comment/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.save-comment',
    'uses' => 'ExmFacultyController@saveComment'
]);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// still working on it ->>




Route::any('faculty/exm-question-paper/evaluate-exm-questions/{exm_question_id}',[
    'as' => 'faculty.exm-question-paper.evaluate-exm-questions',
    'uses' => 'ExmFacultyController@evaluateExmQuestions'
]);


//

Route::any('faculty/exm-question-paper/evaluate-exm-questions-items/{exm_question_id}/{evaluation_id}/{no_q}',[
    'as' => 'faculty.exm-question-paper.evaluate-exm-questions-items',
    'uses' => 'ExmFacultyController@evaluateExmQuestionsItems'
]);


Route::any('faculty/exm-question-paper-to-store-evaluated-exm-questions',[
    'as' => 'faculty.exm-question-paper-to-store-evaluated-exm-questions',
    'uses' => 'ExmFacultyController@storeEvaluatedExmQuestionItems'
]);



