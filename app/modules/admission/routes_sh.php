<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 3/29/2015
 * Time: 12:34 PM
 */




Route::any('admission/faculty/batch-admtest-subject',[
    'as' => 'admission.faculty.batch-admtest-subject',
    'uses' => 'AdmFacultyController@indexBatchAdmTestSubject'
]);


Route::any('admission/faculty/batch-admtest-subject/search-admtest-subject-index',[
    'as' => 'admission.faculty.batch-admtest-subject.search-admtest-subject-index',
    'uses' => 'AdmFacultyController@searchBatchAdmTestSubject'
]);


Route::any('admission/faculty/batch-admtest-subject/batchDelete', [
    'as' => 'admission.faculty.batch-admtest-subject.batchDelete',
    'uses' => 'AdmFacultyController@batchDelete'
]);