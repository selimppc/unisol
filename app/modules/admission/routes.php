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

// ----------------------------------------       VERSION 1    ---------------------------------------------------------
// ----------------------------------------AMW : Admission Test --------------------------------------------------------


//Deshboard
//Route::any('admission_test/amw/dashboard', [
//    'as' => 'admission_test.amw.dashboard',
//    'uses' => 'AdmissionController@admAmwDashboard'
//]);
//
////Index
//Route::any('admission_test/amw/index',[
//    'as' => 'admission_test.amw.index',
//    'uses' => 'AdmissionController@admissionTestIndex'
//]);
//
//Route::any('admission_test/amw/search-index', [
//    'as' => 'admission_test.amw.search_index',
//    'uses' => 'AdmissionController@searchIndex'
//]);

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


// ----------------------------------------------      New    ----------------------------------------------------------
// ----------------------------------------       VERSION 2    ---------------------------------------------------------
// ----------------------------------------AMW : Batch Management ------------------------------------------------------


Route::any('admission/amw/batch',[
    'as' => 'admission.amw.batch',
    'uses' => 'AdmAmwController@batchIndex'
]);

Route::any('admission/amw/batch/create',[
    'as' => 'admission.amw.batch.create',
    'uses' => 'AdmAmwController@batchCreate'
]);

Route::any('admission/amw/batch/store', [
    'as' => 'admission.amw.batch.store',
    'uses' => 'AdmAmwController@batchStore'
]);

Route::get('admission/amw/batch/show/{id}', [
    'as' => 'admission.amw.batch.show',
    'uses' => 'AdmAmwController@batchShow'
]);

Route::any('admission/amw/batch/edit/{id}', [
    'as' => 'admission.amw.batch.edit',
    'uses' => 'AdmAmwController@batchEdit'
]);

Route::any('admission/amw/batch/update/{id}', [
    'as' => 'admission.amw.batch.update',
    'uses' => 'AdmAmwController@batchUpdate'
]);

//Route::any('common/course/batch/destroy/{id}', [
//    'as' => 'common.course.batch.destroy',
//    'uses' => 'AdmAmwController@destroy'
//]);
//
Route::any('admission/amw/batch/batchDelete', [
    'as' => 'admission.amw.batch.batchDelete',
    'uses' => 'AdmAmwController@batchDelete'
]);

//...................................Batch Adm Test Subject........................................................

Route::any('admission/amw/batch-adm-test-subject/{batch_id}',[
    'as' => 'admission.amw.batch-adm-test-subject',
    'uses' => 'AdmAmwController@indexBatchAdmTestSubject'
]);


Route::any('admission/amw/batch-adm-test-subject/view_admtest_subject/{id}', [
    'as' => 'admission.amw.batch-adm-test-subject.view_admtest_subject',
    'uses' => 'AdmAmwController@viewBatchAdmTestSubject'
]);

Route::any('admission/amw/batch-adm-test-subject/create_admtest_subject/{batch_id}',[
    'as' => 'admission.amw.batch-adm-test-subject.create_admtest_subject',
    'uses' => 'AdmAmwController@createBatchAdmTestSubject'
]);

Route::any('admission/amw/batch-adm-test-subjects/store_admtest_subjects', [
    'as' => 'admission.amw.batch-adm-test-subjects.store_admtest_subjects',
    'uses' => 'AdmAmwController@storeBatchAdmTestSubject'
]);

Route::any('admission/amw/batch-adm-test-subject/edit_admtest_subject/{id}', [
    'as' => 'admission.amw.batch-adm-test-subject.edit_admtest_subject',
    'uses' => 'AdmAmwController@editBatchAdmTestSubject'
]);


Route::any('admission/amw/batch-adm-test-subject/update_admtest_subject/{id}', [
    'as' => 'admission.amw.batch-adm-test-subject.update_admtest_subject',
    'uses' => 'AdmAmwController@updateBatchAdmTestSubject'
]);



//...................................Only Adm Test Subject........................................................

Route::any('admission/amw/admission-test-subject',[
    'as' => 'admission.amw.admission-test-subject',
    'uses' => 'AdmAmwController@indexAdmissionTestSubject'
]);

Route::any('admission/amw/admission-test-subject/create-admission-test-subject',[
    'as' => 'admission.amw.admission-test-subject.create-admission-test-subject',
    'uses' => 'AdmAmwController@createAdmissionTestSubject'
]);


Route::any('admission/amw/admission-test-subject/store-admission-test-subject', [
    'as' => 'admission.amw.admission-test-subject.store-admission-test-subject',
    'uses' => 'AdmAmwController@storeAdmissionTestSubject'
]);

Route::get('admission/amw/admission-test-subject/view-admission-test-subject/{id}', [
    'as' => 'admission.amw.admission-test-subject.view-admission-test-subject',
    'uses' => 'AdmAmwController@viewAdmissionTestSubject'
]);

Route::any('admission/amw/admission-test-subject/edit-admission-test-subject/{id}', [
    'as' => 'admission.amw.admission-test-subject.edit-admission-test-subject',
    'uses' => 'AdmAmwController@editAdmissionTestSubject'
]);

Route::any('admission/amw/admission-test-subject/update-admission-test-subject/{id}', [
    'as' => 'admission.amw.admission-test-subject.update-admission-test-subject',
    'uses' => 'AdmAmwController@updateAdmissionTestSubject'
]);


//...................................Admission Test Home........................................................
//currently working here


Route::any('admission/amw/admission-test-home',[
    'as' => 'admission.amw.admission-test-home',
    'uses' => 'AdmAmwController@admissionTestIndex'
]);  //ok



Route::any('admission/amw/adm-test-home/batchDelete',[
    'as' => 'admission.amw.adm-test-home/batchDelete',
    'uses' => 'AdmAmwController@admissionTestBatchDelete'
]);

Route::any('admission/amw/adm-test-home/search-adm-test-index',[
    'as' => 'admission.amw.adm-test-home/search-adm-test-index',
    'uses' => 'AdmAmwController@admissionTestSearchIndex'
]);


//...................................Admission Examiner........................................................
///{year_id}/{semester_id}/{degree_id}

Route::any('admission/amw/admission-test-examiner/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-examiner',
    'uses' => 'AdmAmwController@admExaminerIndex'
]);

Route::any('admission/amw/admission-test-examiner/add-admission-test-examiner/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-examiner.add-admission-test-examiner',
    'uses' => 'AdmAmwController@addAdmTestExaminer'
]);

Route::any('admission/amw/admission-test-examiner/store-admission-test-examiner',[
    'as' => 'admission.amw.admission-test-examiner.store-admission-test-examiner',
    'uses' => 'AdmAmwController@storeAdmTestExaminer'
]);

Route::any('admission/amw/admission-test-examiner/view-admission-test-examiner/{id}',[
    'as' => 'admission.amw.admission-test-examiner.view-admission-test-examiner',
    'uses' => 'AdmAmwController@viewAdmTestExaminers'
]);
//...................................Admission Question........................................................

Route::any('admission/amw/admission-test-question/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-question',
    'uses' => 'AdmAmwController@admQuestionIndex'
]);

Route::any('admission/amw/admission-test-question/create-admtest-question-paper/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-question.create-admtest-question-paper',
    'uses' => 'AdmAmwController@createAdmTestQuestionPaper'
]);

Route::any('admission/amw/admission-test-question/store-admtest-question-paper',[
    'as' => 'admission.amw.admission-test-question.store-admtest-question-paper',
    'uses' => 'AdmAmwController@storeAdmTestQuestionPaper'
]);

Route::any('admission/amw/admission-test-question/view-admtest-question-paper/{id}',[
    'as' => 'admission.amw.admission-test-question.view-admtest-question-paper',
    'uses' => 'AdmAmwController@viewAdmTestQuestionPaper'
]);

Route::any('admission/amw/admission-test-question/edit-admtest-question-paper/{id}/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-question.edit-admtest-question-paper',
    'uses' => 'AdmAmwController@editAdmTestQuestionPaper'
]);

Route::any('admission/amw/admission-test-question/update-admtest-question-paper/{id]',[
    'as' => 'admission.amw.admission-test-question.update-admtest-question-paper',
    'uses' => 'AdmAmwController@updateAdmTestQuestionPaper'
]);




//...................................Admission Question Evaluation........................................................

Route::any('admission/amw/admission-question-evaluation',[
    'as' => 'admission.amw.admission-question-evaluation',
    'uses' => 'AdmAmwController@admQuestionEvaluationIndex'
]);




//******************Degree Course Start(R)********************

Route::any('admission/amw/degree-course/{id}', [
    'as' => 'admission.amw.degree_courses',
    'uses' => 'AdmAmwController@degree_courses_index'
]);

Route::post('admission/amw/degree-courses/save',
    'AdmAmwController@degree_courses_save'
);

Route::get('admission/amw/degree-courses/delete/{id}',
    'AdmAmwController@degree_courses_delete'
);

//******************Batch Course Start(R)*********************

Route::any('admission/amw/batch-course/{batch_id}/{deg_id}', [
    'as' => 'admission.amw.batch_course',
    'uses' => 'AdmAmwController@batch_course_index'
]);

Route::post('admission/amw/batch-course/save',
    'AdmAmwController@batch_course_save'
);

Route::any('admission/amw/batch-course-delete/{id}', [
    'as' => 'batch-course-delete',
    'uses' => 'AdmAmwController@batch_course_delete'
]);

Route::any('admission/amw/save/batch-data',[
    'as' => 'batch.save',
    'uses' => 'AdmAmwController@batch_data_save'
]);

//******************Assign Faculty Start(R)*********************

Route::any('admission/amw/assign-faculty/{course_id}/{dep_id}', [
    'as' => 'assign-faculty',
    'uses' => 'AdmAmwController@assign_faculty_index'
]);

Route::post('admission/amw/assign-faculty-save',
    'AdmAmwController@assign_faculty_save'
);
