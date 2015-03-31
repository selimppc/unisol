<?php
/**
 * Created by PhpStorm.
 * User: SHAFI
 * Date: 3/29/2015
 * Time: 12:34 PM
 */


// adm_examiner


Route::any('admission/faculty/admission-test',[
    'as' => 'admission.faculty.admission-test',
    'uses' => 'AdmFacultyController@indexAdmExaminer'
]);
//ok


Route::any('admission/faculty/admission-test/search-adm-examiner-index',[
    'as' => 'admission.faculty.admission-test.search-adm-examiner-index',
    'uses' => 'AdmFacultyController@searchAdmExaminer'
]);
//ok

Route::any('admission/faculty/admission-test/view-admtest/{id}',[
    'as' => 'admission.faculty.admission-test.view-admtest',
    'uses' => 'AdmFacultyController@viewAdmTest'
]);
//ok



Route::any('admission/faculty/admission-test/batchDelete', [
    'as' => 'admission.faculty.admission-test.batchDelete',
    'uses' => 'AdmFacultyController@batchDelete'
]);
//.

Route::any('admission/faculty/admission-test/accept-admtest',[
    'as' => 'admission.faculty.admission-test.accept-admtest',
    'uses' => 'AdmFacultyController@acceptAdmTest'
]);
//.

Route::any('admission/faculty/admission-test/deny-admtest',[
    'as' => 'admission.faculty.admission-test.deny-admtest',
    'uses' => 'AdmFacultyController@denyAdmTest'
]);
//.

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
//->

Route::any('admission/faculty/question-papers/specific-question-edit/{id}',[
    'as' => 'admission.faculty.question-papers.specific-question-edit',
    'uses' => 'AdmFacultyController@editSpecificQuestionItems'
]);
//->

Route::any('admission/faculty/question-papers/specific-question-update/{id]',[
    'as' => 'admission.faculty.question-papers.specific-question-update',
    'uses' => 'AdmFacultyController@updateSpecificQuestionItems'
]);
//.



Route::any('admission/faculty/question-papers/add-question-paper-item/{id}',[
    'as' => 'admission.faculty.question-papers.add-question-paper-item',
    'uses' => 'AdmFacultyController@addQuestionItems'
]);
//.

Route::any('admission/faculty/question-papers/store-question-paper-item',[
    'as' => 'admission.faculty.question-papers.store-question-paper-item',
    'uses' => 'AdmFacultyController@storeQuestionItems'
]);
//.



Route::any('admission/faculty/question-papers/assign-to-question-paper',[
    'as' => 'admission.faculty.question-papers.assign-to-question-paper',
    'uses' => 'AdmFacultyController@assignQuestionPaper'
]);
//.

Route::any('admission/faculty/question-papers/evaluate-questions',[
    'as' => 'admission.faculty.question-papers.evaluate-questions',
    'uses' => 'AdmFacultyController@evaluateQuestions'
]);
//.