<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 3/29/2015
 * Time: 12:34 PM
 */


// adm_examiner

Route::any('admission/faculty/admission-test',[
    'as' => 'admission.faculty.admission-test',
    'uses' => 'AdmFacultyController@indexAdmExaminer'
]);

Route::any('admission/faculty/admission-test/search-adm-examiner-index',[
    'as' => 'admission.faculty.admission-test.search-adm-examiner-index',
    'uses' => 'AdmFacultyController@searchAdmExaminer'
]);

Route::any('admission/faculty/admission-test/batchDelete', [
    'as' => 'admission.faculty.admission-test.batchDelete',
    'uses' => 'AdmFacultyController@batchDelete'
]);


Route::any('admission/faculty/admission-test/accept-admtest',[
    'as' => 'admission.faculty.admission-test.accept-admtest',
    'uses' => 'AdmFacultyController@acceptAdmTest'
]);

Route::any('admission/faculty/admission-test/deny-admtest',[
    'as' => 'admission.faculty.admission-test.deny-admtest',
    'uses' => 'AdmFacultyController@denyAdmTest'
]);

Route::any('admission/faculty/admission-test/admtest-question-paper',[
    'as' => 'admission.faculty.admission-test.admtest-question-paper',
    'uses' => 'AdmFacultyController@admTestQuestionPaper'
]);


