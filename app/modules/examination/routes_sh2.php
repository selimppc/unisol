<?php
//AMW ROUTE CONFIGURATION




//FACULTY ROUTE CONFIGURATION
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
//ok

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


// kaj baki view, file location everything.... route setting ok


Route::any('faculty/examination-quest-paper-item/add-exm-quest-paper-item/{exm_question_id}',[
    'as' =>'faculty.examination-quest-paper-item.add-exm-quest-paper-item',
    'uses' => 'ExmFacultyController@addExaminationModuleQuestionPaperItem'
]);


// still working on it|
Route::any('faculty/exm-quest-paper-item/store-exm-quest-paper-item',[
    'as' =>'faculty.examination-quest-paper-item.add-exm-quest-paper-item',
    'uses' => 'ExmFacultyController@storeExmQPItem'
]);





Route::any('faculty/exm-question-paper/view-exm-questions-items/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.view-exm-questions-items',
    'uses' => 'ExmFacultyController@viewExmQuestionsItems'
]);

Route::any('faculty/exm-question-paper/save-comment/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.save-comment',
    'uses' => 'ExmFacultyController@saveComment'
]);




Route::any('faculty/exm-question-paper/evaluate/{exm_question_id}',[
    'as' =>'faculty.exm-question-paper.evaluate',
    'uses' => 'ExmFacultyController@evaluateExm'
]);







