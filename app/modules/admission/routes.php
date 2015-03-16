<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
==================================================================
Shafi
==================================================================
*/

include("routes_tjt.php");



// ----------------------------------------AMW : Admission Test --------------------------------------------------------

//Deshboard
Route::any('admission_test/amw/dashboard', [
    'as' => 'admission_test.amw.dashboard',
    'uses' => 'AdmissionController@admAmwDashboard'
]);

//Index
Route::any('admission_test/amw/index',[
    'as' => 'admission_test.amw.index',
    'uses' => 'AdmissionController@admissionTestIndex'
]);

Route::any('admission_test/amw/search-index', [
    'as' => 'admission_test.amw.search_index',
    'uses' => 'AdmissionController@searchIndex'
]);

// ----------------------------------------AMW : Examiner --------------------------------------------------------


Route::any('admission_test/amw/examiners/{year_id}/{semester_id}/{degree_id}', [
    'as' => 'admission_test.amw.examiners',
    'uses' => 'AdmissionController@examiners'
]);

Route::any('admission_test/amw/view_examiners/{id}', [
    'as' => 'admission_test.amw.view_examiners',
    'uses' => 'AdmissionController@viewExaminers'
]);

Route::any('admission_test/amw/store_examiners', [
    'as' => 'admission_test.amw.store_examiners',
    'uses' => 'AdmissionController@storeExaminers'
]);

// ----------------------------------------AMW : Question Paper --------------------------------------------------------


Route::any('admission_test/amw/question_paper/{year_id}/{semester_id}/{degree_id}', [
    'as' => 'admission_test.amw.question_paper',
    'uses' => 'AdmissionController@questionPaper'
]);

Route::any('admission_test/amw/store_question_paper', [
    'as' => 'admission_test.amw.store_question_paper',
    'uses' => 'AdmissionController@storeQuestionPaper'
]);

Route::any('admission_test/amw/view_question_paper/{id}', [
    'as' => 'admission_test.amw.view_question_paper',
    'uses' => 'AdmissionController@viewQuestionPaper'
]);

Route::any('admission_test/amw/edit_question_paper/{id}', [
    'as' => 'admission_test.amw.edit_question_paper',
    'uses' => 'AdmissionController@editQuestionPaper'
]);

Route::any('admission_test/amw/update_question_paper/{id}', [
    'as' => 'admission_test.amw.update_question_paper',
    'uses' => 'AdmissionController@updateQuestionPaper'
]);

// ----------------------------------------AMW : Manage Adm Test Management --------------------------------------------------------

Route::any('admission_test/amw/mng_adm_test_subject',[
    'as' => 'admission_test.amw.mng_adm_test_subject',
    'uses' => 'AdmissionController@mngAdmTestSubject'
]);

Route::any('admission_test/amw/store_admtest_subject', [
    'as' => 'admission_test.amw.store_admtest_subject',
    'uses' => 'AdmissionController@storeAdmTestSubject'
]);

Route::any('admission_test/amw/view_admtest_subject/{id}', [
    'as' => 'admission_test.amw.view_admtest_subject',
    'uses' => 'AdmissionController@viewAdmTestSubject'
]);

Route::any('admission_test/amw/edit_admtest_subject/{id}', [
    'as' => 'admission_test.amw.edit_admtest_subject',
    'uses' => 'AdmissionController@editAdmTestSubject'
]);

//update route

// ----------------------------------------AMW : Adm Degree Management --------------------------------------------------------

Route::any('admission_test/amw/adm-test-degree',[
    'as' => 'admission_test.amw.adm-test-degree',
    'uses' => 'AdmissionController@degreeManagement'
]);

Route::any('admission_test/amw/search-adm-test-degree', [
    'as' => 'admission_test.amw./search-adm-test-degree',
    'uses' => 'AdmissionController@searchAdmTestDegree'
]);

Route::any('admission_test/amw/store_degree_management', [
    'as' => 'admission_test.amw.store_degree_management',
    'uses' => 'AdmissionController@storeDegreeManagement'
]);

Route::any('admission_test/amw/view_degree_management/{id}', [
    'as' => 'admission_test.amw.view_degree_management',
    'uses' => 'AdmissionController@viewDegreeManagement'
]);

Route::any('admission_test/amw/edit_degree_management/{id}', [
    'as' => 'admission_test.amw.edit_degree_management',
    'uses' => 'AdmissionController@editDegreeManagement'
]);


Route::any('admission_test/amw/update_degree_management/{id}', [
    'as' => 'admission_test.amw.update_degree_management',
    'uses' => 'AdmissionController@updateDegreeManagement'
]);


// ----------------------------------------AMW : Adm Subject Management --------------------------------------------------------

Route::any('admission_test/amw/adm-test-subject',[
    'as' => 'admission_test.amw.adm-test-subject',
    'uses' => 'AdmissionController@subjectManagement'
]);

Route::any('admission_test/amw/store_subject_management', [
    'as' => 'admission_test.amw.store_subject_management',
    'uses' => 'AdmissionController@storeSubjectManagement'
]);

Route::any('admission_test/amw/view_subject_management/{id}', [
    'as' => 'admission_test.amw.view_subject_management',
    'uses' => 'AdmissionController@viewSubjectManagement'
]);

Route::any('admission_test/amw/edit_subject_management/{id}', [
    'as' => 'admission_test.amw.edit_subject_management',
    'uses' => 'AdmissionController@editSubjectManagement'
]);


Route::any('admission_test/amw/update_subject_management/{id}', [
    'as' => 'admission_test.amw.update_subject_management',
    'uses' => 'AdmissionController@updateSubjectManagement'
]);



