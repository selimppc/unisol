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
//.



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

Route::any('admission/faculty/admission-test/admtest-question-paper/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.faculty.admission-test.admtest-question-paper',
    'uses' => 'AdmFacultyController@admTestQuestionPaper'
]);
//->->

Route::any('admission/faculty/admission-test/view-question-paper/{id}',[
    'as' => 'admission.faculty.admission-test.view-question-paper',
    'uses' => 'AdmFacultyController@viewQuestionPaper'
]);
//.

Route::any('admission/faculty/admission-test/view-questions-items/{id}',[
    'as' => 'admission.faculty.admission-test.view-questions-items',
    'uses' => 'AdmFacultyController@viewQuestionsItems'
]);
//.

Route::any('admission/faculty/admission-test/add-question-paper',[
    'as' => 'admission.faculty.admission-test.add-question-paper',
    'uses' => 'AdmFacultyController@addQuestionPaper'
]);
//.

Route::any('admission/faculty/admission-test/assign-to-question-paper',[
    'as' => 'admission.faculty.admission-test.assign-to-question-paper',
    'uses' => 'AdmFacultyController@assignQuestionPaper'
]);
//.

Route::any('admission/faculty/admission-test/evaluate-questions',[
    'as' => 'admission.faculty.admission-test.evaluate-questions',
    'uses' => 'AdmFacultyController@evaluateQuestions'
]);
//.