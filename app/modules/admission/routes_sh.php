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