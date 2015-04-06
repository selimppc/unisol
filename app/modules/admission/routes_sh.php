<?php
/**
 * Created by PhpStorm.
 * User: SHAFI
 * Date: 3/29/2015
 * Time: 12:34 PM
 */


Route::any('admission/faculty/admission-test',[
    'as' => 'admission.faculty.admission-test',
    'uses' => 'AdmFacultyController@indexAdmExaminer'
]);
//D


Route::any('admission/faculty/admission-test/change-status-to-deny/{id}',[
    'as' => 'admission.faculty.admission-test.change-status-to-deny',
    'uses' => 'AdmFacultyController@changeStatusByFacultyAdmTest'
]);
//-->



Route::any('admission/faculty/admission-test/search-adm-examiner-index',[
    'as' => 'admission.faculty.admission-test.search-adm-examiner-index',
    'uses' => 'AdmFacultyController@searchAdmExaminer'
]);
//D

Route::any('admission/faculty/admission-test/view-admtest/{id}',[
    'as' => 'admission.faculty.admission-test.view-admtest',
    'uses' => 'AdmFacultyController@viewAdmTest'
]);
//D

Route::any('admission/faculty/admission-test/qpBatchDelete', [
    'as' => 'admission.faculty.admission-test.qpBatchDelete',
    'uses' => 'AdmFacultyController@qpBatchDelete'
]);
//D

Route::any('admission/faculty/admission-test/accept-admtest',[
    'as' => 'admission.faculty.admission-test.accept-admtest',
    'uses' => 'AdmFacultyController@acceptAdmTest'
]);
//x

Route::any('admission/faculty/admission-test/deny-admtest',[
    'as' => 'admission.faculty.admission-test.deny-admtest',
    'uses' => 'AdmFacultyController@denyAdmTest'
]);
//x

Route::any('admission/faculty/question-papers/admtest-question-paper/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.faculty.question-papers.admtest-question-paper',
    'uses' => 'AdmFacultyController@admTestQuestionPaper'
]);
//D

Route::any('admission/faculty/question-papers/view-question-paper/{id}',[
    'as' => 'admission.faculty.question-papers.view-question-paper',
    'uses' => 'AdmFacultyController@viewQuestionPaper'
]);
//D

Route::any('admission/faculty/question-papers/view-questions-items/{id}',[
    'as' => 'admission.faculty.question-papers.view-questions-items',
    'uses' => 'AdmFacultyController@viewQuestionsItems'
]);
//D

Route::any('admission/faculty/question-papers/specific-question-view/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-view',
    'uses' => 'AdmFacultyController@viewSpecificQuestionItems'
]);
//D

Route::any('admission/faculty/question-papers/specific-question-edit/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-edit',
    'uses' => 'AdmFacultyController@editSpecificQuestionItems'
]);
//D

Route::any('admission/faculty/question-papers/specific-question-update/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-update',
    'uses' => 'AdmFacultyController@updateSpecificQuestionItems'
]);
//D

Route::any('admission/faculty/question-papers/add-question-paper-item/{id}',[
    'as' => 'admission.faculty.question-papers.add-question-paper-item',
    'uses' => 'AdmFacultyController@addQuestionItems'
]);
//D

Route::any('admission/faculty/question-papers/store-question-paper-item',[
    'as' => 'admission.faculty.question-papers.store-question-paper-item',
    'uses' => 'AdmFacultyController@storeQuestionItems'
]);
//D

Route::any('admission/faculty/question-papers/view-assign-to-question-paper/{q_id}',[
    'as' => 'admission.faculty.question-papers.view-assign-to-question-paper',
    'uses' => 'AdmFacultyController@viewAssignQuestionPaper'
]);
//D


Route::any('admission/faculty/question-papers/adm-test-qp-assign/{id}',[
    'as' => 'admission.faculty.question-papers.adm-test-qp-assign',
    'uses' => 'AdmFacultyController@commentAssignQuestionPaper'
]);
//-> 5% remaining

Route::any('admission/faculty/question-papers/evaluate-questions/{id}',[
    'as' => 'admission.faculty.question-papers.evaluate-questions',
    'uses' => 'AdmFacultyController@evaluateQuestions'
]);
//on process

Route::any('admission/faculty/question-papers/evaluate-questions-items/{adm_question_id}/{adm_question_items_id}',[
    'as' => 'admission.faculty.question-papers.evaluate-questions-items',
    'uses' => 'AdmFacultyController@evaluateQuestionsitems'
]);
//on process

Route::any('admission/faculty/question-papers/store-evaluated-questions',[
    'as' => 'admission.faculty.question-papers.store-evaluated-questions',
    'uses' => 'AdmFacultyController@storeEvaluatedQuestionItems'
]);
//..

Route::any('admission/faculty/question-papers/re-evaluate-questions-items/{id}',[
    'as' => 'admission.faculty.question-papers.re-evaluate-questions-items',
    'uses' => 'AdmFacultyController@reEvaluateQuestionsitems'
]);
//.



