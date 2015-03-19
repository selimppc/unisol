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
include("routes_ra.php");

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



// ----------------------------------------AMW : Batch Management --------------------------------------------------------


Route::any('admission/amw/batch-management',[
    'as' => 'admission.amw.batch-management',
    'uses' => 'AdmissionController@batchManagementIndex'
]);

Route::any('admission/amw/create',[
    'as' => 'admission.amw.create',
    'uses' => 'AdmissionController@create'
]);

Route::any('admission/amw/store', [
    'as' => 'admission.amw.store',
    'uses' => 'AdmissionController@store'
]);

Route::get('admission/amw/show/{id}', [
    'as' => 'admission.amw.show',
    'uses' => 'AdmissionController@show'
]);

Route::any('admission/amw/edit/{id}', [
    'as' => 'admission.amw.edit',
    'uses' => 'AdmissionController@edit'
]);

Route::any('admission/amw/update/{id}', [
    'as' => 'admission.amw.update',
    'uses' => 'AdmissionController@update'
]);

//Route::any('common/course/destroy/{id}', [
//    'as' => 'common.course.destroy',
//    'uses' => 'AdmissionController@destroy'
//]);
//
Route::any('admission/amw/batchDelete', [
    'as' => 'admission.amw.batchDelete',
    'uses' => 'AdmissionController@batchDelete'
]);

//...................................Batch Adm Test Subject........................................................

Route::any('admission/amw/mng_adm_test_subject/{batch_id}',[
    'as' => 'admission.amw.mng_adm_test_subject',
    'uses' => 'AdmissionController@mngBatchAdmTestSubject'
]);


Route::any('admission/amw/view_admtest_subject/{id}', [
    'as' => 'admission.amw.view_admtest_subject',
    'uses' => 'AdmissionController@viewBatchAdmTestSubject'
]);

Route::any('admission/amw/create_admtest_subject/{batch_id}',[
    'as' => 'admission.amw.create_admtest_subject',
    'uses' => 'AdmissionController@createBatchAdmTestSubject'
]);

Route::any('admission/amw/store_admtest_subject', [
    'as' => 'admission.amw.store_admtest_subject',
    'uses' => 'AdmissionController@storeBatchAdmTestSubject'
]);

Route::any('admission/amw/edit_admtest_subject/{id}', [
    'as' => 'admission.amw.edit_admtest_subject',
    'uses' => 'AdmissionController@editBatchAdmTestSubject'
]);


Route::any('admission/amw/update_admtest_subject/{id}', [
    'as' => 'admission.amw.update_admtest_subject',
    'uses' => 'AdmissionController@updateBatchAdmTestSubject'
]);



//...................................Only Adm Test Subject........................................................

Route::any('admission/amw/admission-test-subject-index',[
    'as' => 'admission.amw.admtest-subject-index',
    'uses' => 'AdmissionController@AdmissionTestSubjectIndex'
]);

Route::any('admission/amw/create-admission-test-subject',[
    'as' => 'admission.amw.create-admission-test-subject',
    'uses' => 'AdmissionController@createAdmissionTestSubject'
]);


Route::any('admission/amw/store-admission-test-subject', [
    'as' => 'admission.amw.store-admission-test-subject',
    'uses' => 'AdmissionController@storeAdmissionTestSubject'
]);

Route::get('admission/amw/view-admission-test-subject/{id}', [
    'as' => 'admission.amw.view-admission-test-subject',
    'uses' => 'AdmissionController@viewAdmissionTestSubject'
]);

Route::any('admission/amw/edit-admission-test-subject/{id}', [
    'as' => 'admission.amw.edit-admission-test-subject',
    'uses' => 'AdmissionController@editAdmissionTestSubject'
]);

Route::any('admission/amw/update-admission-test-subject/{id}', [
    'as' => 'admission.amw.update-admission-test-subject',
    'uses' => 'AdmissionController@updateAdmissionTestSubject'
]);