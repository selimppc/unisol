<?php
/**
 * Created by PhpStorm.
 * User: SHAFI
 * Date: 3/29/2015
 * Time: 12:34 PM
 */

Route::any('admission/faculty/course',[
    'as' => 'admission.faculty.course',
    'uses' => 'AdmFacultyController@indexCourse'
]);
//ok

Route::any('admission/faculty/course/assign/{id}',[
    'as' => 'admission.faculty.course.assign',
    'uses' => 'AdmFacultyController@assignCourse'
]);
//ok

Route::any('admission/faculty/course/course-assign/{id}',[
    'as' => 'admission.faculty.course.course-assign',
    'uses' => 'AdmFacultyController@commentAssignCourse'
]);
//ok

Route::any('admission/faculty/admission-test',[
    'as' => 'admission.faculty.admission-test',
    'uses' => 'AdmFacultyController@indexAdmExaminer'
]);
//ok

Route::any('admission/faculty/admission-test/change-status-to-deny/{id}',[
    'as' => 'admission.faculty.admission-test.change-status-to-deny',
    'uses' => 'AdmFacultyController@changeStatustoDenyByFacultyAdmTest'
]);
//ok

Route::any('admission.faculty/admission-test/change-status-to-accept/{id}',[
    'as' => 'admission.faculty.admission-test.change-status-to-accept',
    'uses' => 'AdmFacultyController@changeStatusToAcceptedByFacultyAdmTest'
]);
//ok

Route::any('admission/faculty/admission-test/search-adm-examiner-index',[
    'as' => 'admission.faculty.admission-test.search-adm-examiner-index',
    'uses' => 'AdmFacultyController@searchAdmExaminer'
]);
//ok

Route::any('admission/faculty/admission-test/view-admtest/{batch_id}',[
    'as' => 'admission.faculty.admission-test.view-admtest',
    'uses' => 'AdmFacultyController@viewAdmTest'
]);
//ok

Route::any('admission/faculty/admission-test/view-admtest-comment',[
    'as' => 'admission.faculty.admission-test.view-admtest-comment',
    'uses' => 'AdmFacultyController@viewAdmTestComment'
]);
//ok

Route::any('admission/faculty/admission-test/qpBatchDelete', [
    'as' => 'admission.faculty.admission-test.qpBatchDelete',
    'uses' => 'AdmFacultyController@qpBatchDelete'
]);
//ok

Route::any('admission/faculty/admission-test/deny-admtest',[
    'as' => 'admission.faculty.admission-test.deny-admtest',
    'uses' => 'AdmFacultyController@denyAdmTest'
]);
//ok

Route::any('admission/faculty/question-papers/admtest-question-paper/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.faculty.question-papers.admtest-question-paper',
    'uses' => 'AdmFacultyController@admTestQuestionPaper'
]);
//ok

Route::any('admission/faculty/question-papers/view-question-paper/{id}',[
    'as' => 'admission.faculty.question-papers.view-question-paper',
    'uses' => 'AdmFacultyController@viewQuestionPaper'
]);
//ok

Route::any('admission/faculty/question-papers/view-questions-items/{id}',[
    'as' => 'admission.faculty.question-papers.view-questions-items',
    'uses' => 'AdmFacultyController@viewQuestionsItems'
]);
//ok

Route::any('admission/faculty/question-papers/specific-question-view/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-view',
    'uses' => 'AdmFacultyController@viewSpecificQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/specific-question-edit/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-edit',
    'uses' => 'AdmFacultyController@editSpecificQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/specific-question-update/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-update',
    'uses' => 'AdmFacultyController@updateSpecificQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/add-question-paper-item/{id}',[
    'as' => 'admission.faculty.question-papers.add-question-paper-item',
    'uses' => 'AdmFacultyController@addQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/store-question-paper-item',[
    'as' => 'admission.faculty.question-papers.store-question-paper-item',
    'uses' => 'AdmFacultyController@storeQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/view-assign-to-question-paper/{q_id}',[
    'as' => 'admission.faculty.question-papers.view-assign-to-question-paper',
    'uses' => 'AdmFacultyController@viewAssignQuestionPaper'
]);
//ok

Route::any('admission/faculty/question-papers/adm-test-qp-assign/{id}',[
    'as' => 'admission.faculty.question-papers.adm-test-qp-assign',
    'uses' => 'AdmFacultyController@commentAssignQuestionPaper'
]);
//ok

Route::any('admission/faculty/question-papers/evaluate-questions/{id}',[
    'as' => 'admission.faculty.question-papers.evaluate-questions',
    'uses' => 'AdmFacultyController@evaluateQuestions'
]);
//ok

Route::any('admission/faculty/question-papers/evaluate-questions-items/{adm_question_id}/{no_q}',[
    'as' => 'admission.faculty.question-papers.evaluate-questions-items',
    'uses' => 'AdmFacultyController@evaluateQuestionsitems'
]);
//ok

Route::any('admission/faculty/question-papers/store-evaluated-questions',[
    'as' => 'admission.faculty.question-papers.store-evaluated-questions',
    'uses' => 'AdmFacultyController@storeEvaluatedQuestionItems'
]);
//ok

Route::any('admission/faculty/question-papers/re-evaluate-questions-items/{id}',[
    'as' => 'admission.faculty.question-papers.re-evaluate-questions-items',
    'uses' => 'AdmFacultyController@reEvaluateQuestionsitems'
]);
//ok

