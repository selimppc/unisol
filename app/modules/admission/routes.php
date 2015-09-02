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

// ----------------------------------------AMW : Admission Test --------------------------------------------------------
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

Route::any('admission/amw/batch-delete-question-paper', [
    'as' => 'admission.amw.batch-delete-question-paper',
    'uses' => 'AdmAmwController@batchDeleteQuestionPaper'
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

// ----------------------------------------AMW : Batch Management ------------------------------------------------------

Route::any('admission/amw/batch/{degree_id}',[
    'as' => 'admission.amw.batch',
    'uses' => 'AdmAmwController@batchIndex'
]);

Route::any('admission/amw/batch-create/{degree_id}',[
    'as' => 'admission.amw.batch.create',
    'uses' => 'AdmAmwController@batchCreate'
]);

Route::any('admission/amw/batch-store', [
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


Route::any('admission/amw/batch-adm-test-subject/view_admtest_subject/{id}/{batch_id}', [
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

Route::any('admission/amw/batch-adm-test-subject/edit_admtest_subject/{id}/{batch_id}', [
    'as' => 'admission.amw.batch-adm-test-subject.edit_admtest_subject',
    'uses' => 'AdmAmwController@editBatchAdmTestSubject'
]);


Route::any('admission/amw/batch-adm-test-subject/update_admtest_subject/{id}', [
    'as' => 'admission.amw.batch-adm-test-subject.update_admtest_subject',
    'uses' => 'AdmAmwController@updateBatchAdmTestSubject'
]);

Route::any('admission/amw/batch-delete-batchadmtest-subject', [
    'as' => 'admission.amw.batch-adm-test-subject.batch-delete-admtest-subject',
    'uses' => 'AdmAmwController@batchAdmTestSubjectBatchDelete'
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

Route::any('admission/amw/admission-test-examiner/{batch_id}',[
    'as' => 'admission.amw.admission-test-examiner',
    'uses' => 'AdmAmwController@admExaminerIndex'
]);

Route::any('admission/amw/admission-test-examiner/add-admission-test-examiner/{year_id}/{semester_id}/{batch_id}',[
    'as' => 'admission.amw.admission-test-examiner.add-admission-test-examiner',
    'uses' => 'AdmAmwController@addAdmTestExaminer'
]);

Route::any('admission/amw/admexaminer-add',[
    'as' => 'admission.amw.admexaminer-add',
    'uses' => 'AdmAmwController@storeAdmTestExaminer'
]);

Route::any('admission/amw/admission-test-examiner/view-admission-test-examiner/{batch_id}',[
    'as' => 'admission.amw.admission-test-examiner.view-admission-test-examiner',
    'uses' => 'AdmAmwController@viewAdmTestExaminers'
]);
Route::any('admission/amw/admexaminer-comments',[
    'as' => 'admission.amw.admexaminer-comments',
    'uses' => 'AdmAmwController@admTestExaminersComments'
]);
Route::any('admission/amw/admission-test-examiner/change-status-by-test-examiner/{id}',[
    'as' => 'admission.amw.admission-test-examiner.change-status-by-test-examiner',
    'uses' => 'AdmAmwController@changeStatusByAdmTestExaminer'
]);
Route::any('admission/amw/admission-test-examiner/delete-adm-test-examiner',[
    'as' => 'admission.amw.admission-test-examiner.delete-adm-test-examiner',
    'uses' => 'AdmAmwController@deleteAdmTestExaminer'
]);
//...................................Admission Question........................................................

Route::any('admission/amw/admission-test-question/{batch_id}',[
    'as' => 'admission.amw.admission-test-question',
    'uses' => 'AdmAmwController@admQuestionIndex'
]);

Route::any('admission/amw/admission/create-admtest-question-paper/{batch_id}',[
    'as' => 'admission.amw.admission.create-admtest-question-paper',
    'uses' => 'AdmAmwController@createAdmTestQuestionPaper'
]);

Route::any('admission/amw/save-admission-question',[
    'as' => 'admission.amw.save-admission-question',
    'uses' => 'AdmAmwController@storeAdmTestQuestionPaper'
]);

Route::any('admission/amw/view-admtest-question-paper/{id}',[
    'as' => 'admission.amw.view-admtest-question-paper',
    'uses' => 'AdmAmwController@viewAdmTestQuestionPaper'
]);

Route::any('admission/amw/edit-admtest-question-paper/{id}',[
    'as' => 'admission.amw.edit-admtest-question-paper',
    'uses' => 'AdmAmwController@editAdmTestQuestionPaper'
]);

Route::any('admission/amw/update-admtest-question-paper/{id}',[
    'as' => 'admission.amw.update-admtest-question-paper',
    'uses' => 'AdmAmwController@updateAdmTestQuestionPaper'
]);

Route::any('admission/amw/view-questions-by-paper/{q_id}',[
    'as' => 'admission.amw.view-questions-by-paper',
    'uses' => 'AdmAmwController@viewQuestionsByPaper'
]);

Route::any('admission/amw/question/view-question-item-details/{q_items_id}',[
    'as' => 'admission.amw.question.view-question-item-details',
    'uses' => 'AdmAmwController@viewQuestionItemDetails'
]);

Route::any('admission/amw/admission-test/comments-by-question/{id}',[
    'as' => 'admission.amw.admission-test.comments-by-question',
    'uses' => 'AdmAmwController@assignFacultyCommentsByQuestion'
]);

Route::any('admission/amw/assign-faculty-setter/{q_id}',[
    'as' => 'admission.amw.assign-faculty-setter',
    'uses' => 'AdmAmwController@AssignFacultySetter'
]);

Route::any('admission/amw/assign-faculty-evaluator/{q_id}',[
    'as' => 'admission.amw.assign-faculty-evaluator',
    'uses' => 'AdmAmwController@AssignFacultyEvaluator'
]);

Route::any('admission/amw/admission-test/comments-re-assign/{id}',[
    'as' => 'admission.amw.admission-test.comments-re-assign',
    'uses' => 'AdmAmwController@reAssignFacultyCommentsByQuestion'
]);



//...................................Admission Question Evaluation........................................................

Route::any('admission/amw/question-paper-evaluation/{batch_id}',[
    'as' => 'admission.amw.question-paper-evaluation',
    'uses' => 'AdmAmwController@questionPaperEvaluation'
]);


Route::any('admission/amw/student-list-of-qpe/{adm_question_id}',[
    'as' => 'admission.amw.student-list-of-qpe',
    'uses' => 'AdmAmwController@studentListOfQpe'
]);

Route::any('admission/amw/view-details-of-qpe/{ba_id}/{question_id}/{q_items_id}',[
    'as' => 'admission.amw.view-details-of-qpe',
    'uses' => 'AdmAmwController@viewDetailsOfQpe'
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

Route::any('admission/amw/assign-faculty/{bc_id}', [
    'as' => 'assign-faculty',
    'uses' => 'AdmAmwController@assign_faculty_index'
]);

Route::post('admission/amw/assign-faculty-save',
    'AdmAmwController@assign_faculty_save'
);

/*Tanin

*/
//{------------------ Degree Table -------------------------------------------------------------}

Route::any('admission/amw/degree', [
    'as'=>'admission.amw.degree.index',
    'uses'=>'AdmAmwController@admDegreeIndex'
]);

Route::any('admission/amw/degree/create', [
    'as'=>'common.amw.degree.create',
    'uses'=>'AdmAmwController@admDegreeCreate'
]);

Route::any('admission/amw/degree/store', [
    'as'=>'admission.amw.degree.store',
    'uses'=>'AdmAmwController@admDegreeStore'
]);

Route::any('admission/amw/degree/show/{id}', [
    'as'=>'admission.amw.degree.show',
    'uses'=>'AdmAmwController@admDegreeShow'
]);

Route::any('admission/amw/degree/edit/{id}', [
    'as'=>'admission.amw.degree.edit',
    'uses'=>'AdmAmwController@admDegreeEdit'
]);

Route::any('admission/amw/degree/update/{id}', [
    'as'=>'admission.amw.degree.update',
    'uses'=>'AdmAmwController@admDegreeUpdate'
]);

Route::any('admission/amw/degree/delete/{id}', [
    'as'=>'admission.amw.degree.delete',
    'uses'=>'AdmAmwController@admDegreeDelete'
]);

Route::any('admission/amw/degree/dg_batch_delete', [
    'as'=>'admission.amw.degree.dg_batch_delete',
    'uses'=>'AdmAmwController@admDegreeBatchDelete'
]);


Route::any('admission/amw/degree/search', [
    'as'=>'admission.amw.degree.search',
    'uses'=>'AdmAmwController@admDegreeSearch'
]);

//{----------------- Waiver ----------------------------------------------------------------}

Route::any('admission/amw/waiver',
    ['as'=>'admission.amw.waiver.index',
        'uses'=>'AdmAmwController@admWaiverIndex']);

Route::any('admission/amw/waiver/create',
    ['as'=>'admission.amw.waiver.create',
        'uses'=>'AdmAmwController@admWaiverCreate']);

Route::any('admission/amw/waiver/store',
    ['as'=>'admission.amw.waiver.store',
        'uses'=>'AdmAmwController@admWaiverStore']);

Route::any('admission/amw/waiver/show/{id}',
    ['as'=>'admission.amw.waiver.show',
        'uses'=>'AdmAmwController@admWaiverShow']);

Route::any('admission/amw/waiver/edit/{id}',
    ['as'=>'admission.amw.waiver.edit',
        'uses'=>'AdmAmwController@admWaiverEdit']);

Route::any('admission/amw/waiver/update/{id}',
    ['as'=>'admission.amw.waiver.update',
        'uses'=>'AdmAmwController@admWaiverUpdate']);

Route::any('admission/amw/waiver/delete/{id}',
    ['as'=>'admission.amw.waiver.delete',
        'uses'=>'AdmAmwController@admWaiverDelete']);

//{------------------- Batch-Waiver -------------------------------------------------------------}

Route::any('admission/amw/batch-waiver/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.index',
    'uses' => 'AdmAmwController@batchWaiverIndex'
]);

Route::any('admission/amw/batch-waiver/create/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.create',
    'uses' => 'AdmAmwController@batchWaiverCreate'
]);

Route::any('admission/amw/store-batch-waiver', [
    'as' => 'admission.amw.store-batch-waiver',
    'uses' => 'AdmAmwController@batchWaiverStore'
]);

Route::any('admission/amw/batch-waiver/delete/{bw_id}', [
    'as' => 'admission.amw.batch-waiver.delete',
    'uses' => 'AdmAmwController@batchWaiverDelete'
]);


//{------------------ Waiver Constraint---------------------------------------------------------------------}
Route::any('admission/amw/waiver-constraint/{batch_id}/{bw_id}', [
    'as' => 'admission.amw.waiver-constraint.index',
    'uses' => 'AdmAmwController@waiverConstraintIndex'
]);

Route::any('admission/amw/waiver-time-constraint/create/{batch_waiver_id}', [
    'as' => 'admission.amw.waiver-time-constraint.create',
    'uses' => 'AdmAmwController@waiverTimeConstCreate'
]);
Route::any('admission/amw/waiver-gpa-constraint/create/{batch_waiver_id}', [
    'as' => 'admission.amw.waiver-gpa-constraint.create',
    'uses' => 'AdmAmwController@waiverGpaConstCreate'
]);

Route::any('admission/amw/waiver-constraint/store', [
    'as' => 'admission.amw.waiver-constraint.store',
    'uses' => 'AdmAmwController@waiverConstraintStore'
]);

Route::any('admission/amw/waiver-time-constraint/edit/{id}', [
    'as' => 'admission.amw.waiver-time-constraint.edit',
    'uses' => 'AdmAmwController@waiverTimeConstEdit'
]);

Route::any('admission/amw/waiver-gpa-constraint/edit/{id}', [
    'as' => 'admission.amw.waiver-gpa-constraint.edit',
    'uses' => 'AdmAmwController@waiverGpaConstEdit'
]);
Route::any('admission/amw/constraint-waiver/update/{id}', [
    'as' => 'admission.amw.waiver-constraint.update',
    'uses' => 'AdmAmwController@waiverConstUpdate'
]);

Route::any('admission/amw/constraint-waiver/delete/{id}', [
    'as' => 'admission.amw.waiver-constraint.delete',
    'uses' => 'AdmAmwController@waiverConstDelete'
]);
//{------------------- batch Education Constraint -------------------------------------------------------------}

Route::any('admission/amw/batch-education-constraint',
    ['as'=>'admission.amw.batch-edu-const.index',
        'uses'=>'AdmAmwController@admBatchEduConstIndex']);

Route::any('admission/amw/batch-education-constraint/create',
    ['as'=>'admission.amw.batch-edu-const.create',
        'uses'=>'AdmAmwController@admBatchEduConstCreate']);

Route::any('admission/amw/batch-education-constraint/store',
    ['as'=>'admission.amw.batch-edu-const.store',
        'uses'=>'AdmAmwController@admBatchEduConstStore']);

Route::any('admission/amw/batch-education-constraint/show/{id}',
    ['as'=>'admission.amw.batch-edu-const.show',
        'uses'=>'AdmAmwController@admBatchEduConstShow']);

Route::any('admission/amw/batch-education-constraint/edit/{id}',
    ['as'=>'admission.amw.batch-edu-const.edit',
        'uses'=>'AdmAmwController@admBatchEduConstEdit']);

Route::any('admission/amw/batch-education-constraint/update/{id}',
    ['as'=>'admission.amw.batch-edu-const.update',
        'uses'=>'AdmAmwController@admBatchEduConstUpdate']);

Route::any('admission/amw/batch-education-constraint/delete/{id}',
    ['as'=>'admission.amw.batch-edu-const.delete',
        'uses'=>'AdmAmwController@admBatchEduConstDelete']);


//{------------------ Batch Applicant --------------------------------------------------------------------------------------------}

Route::any('admission/amw/batch-applicant/{id}',
    ['as'=>'admission.amw.batch-applicant.index',
        'uses'=>'AdmAmwController@batchApplicantIndex']);

Route::any('admission/amw/batch-applicant/change/{id}',
    ['as'=>'admission.amw.batch-applicant.change',
        'uses'=>'AdmAmwController@batchApplicantChangeStatus']);

Route::any('admission/amw/batch-applicant/update/{id}',
    ['as'=>'admission.amw.batch-applicant.update',
        'uses'=>'AdmAmwController@batchApplicantUpdateStatus']);


Route::any('admission/amw/batch-applicant/apply/{id}',
    ['as'=>'admission.amw.batch-applicant.apply',
        'uses'=>'AdmAmwController@batchApplicantApply']);

Route::any('admission/amw/batch-applicant/view-applicant/{id}/{batch_id}/{applicant_id}',
    ['as'=>'admission.amw.batch-applicant.view-applicant',
        'uses'=>'AdmAmwController@batchApplicantView']);

//Exam Seat
Route::any('admission/amw/exam-seat/{batch_id}',
    ['as'=>'admission.amw.exam-seat',
        'uses'=>'AdmAmwController@examSeat']);

//......................... Faculty ........................................................

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

Route::any('admission/faculty/course/course-BatchDelete', [
    'as' => 'admission.faculty.course.course-BatchDelete',
    'uses' => 'AdmFacultyController@courseBatchDelete'
]);


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

Route::any('admission/faculty/admission-test/change-status-to-accept/{id}',[
    'as' => 'admission.faculty.admission-test.change-status-to-accept',
    'uses' => 'AdmFacultyController@changeStatusToAcceptedByFacultyAdmTest'
]);
//ok

Route::any('admission/faculty/admission-test/search-adm-examiner-index',[
    'as' => 'admission.faculty.admission-test.search-adm-examiner-index',
    'uses' => 'AdmFacultyController@searchAdmExaminer'
]);
//ok

Route::any('admission/faculty/admission-test/view-admtest/{id}/{batch_id}',[
    'as' => 'admission.faculty.admission-test.view-admtest',
    'uses' => 'AdmFacultyController@viewAdmTest'
]);
//ok

Route::any('admission/faculty/admission-test/view-admtest-comment',[
    'as' => 'admission.faculty.admission-test.view-admtest-comment',
    'uses' => 'AdmFacultyController@viewAdmTestComment'
]);
//ok

Route::any('admission/faculty/admission-test/adm-test-BatchDelete', [
    'as' => 'admission.faculty.admission-test.adm-test-BatchDelete',
    'uses' => 'AdmFacultyController@admTestBatchDelete'
]);
//-->

Route::any('admission/faculty/admission-test/qpBatchDelete', [
    'as' => 'admission.faculty.admission-test.qpBatchDelete',
    'uses' => 'AdmFacultyController@qpBatchDelete'
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

//-------------------------------- Amw: Course Management starts-----------------------------------------------

Route::any('admission/amw/course_conduct/index',
    [ 'as'=> 'course_conduct.index',
        'uses' => 'AdmAmwController@courseConductIndex']);

Route::any('back','AdmAmwController@back');

Route::any('admission/amw/course_conduct/create',
    ['as'=>'course_conduct.create',
        'uses'=>'AdmAmwController@courseConductCreate']);

Route::any('course_manage/store','AdmAmwController@store');
Route::any('course_manage/show/{id}','AdmAmwController@show');
Route::any('course_manage/edit/{id}','AdmAmwController@edit');
Route::any('course_manage/update/{id}','AdmAmwController@update');
Route::any('course_manage/search','AdmAmwController@search');
Route::any('course_manage/search_view','AdmAmwController@cmSearchView');

//------------------------------ Amw : Degree Management starts  --------------------------------------------

Route::any('amw/degree_manage','AdmAmwController@dgmIndex');
Route::any('degree_manage/create','AdmAmwController@dgmCreate');
//Route::any('degree_manage/store','AdmAmwController@dgmStore');
Route::any('degree_manage/store', ['as' => 'degree_manage.store','uses' => 'AdmAmwController@dgmStore']);
Route::any('degree_manage/show/{id}', ['as' => 'degree_manage.show','uses' => 'AdmAmwController@dgmShow']);
Route::any('degree_manage/edit/{id}', ['as' => 'degree_manage.edit','uses' => 'AdmAmwController@dgmEdit']);
Route::any('degree_manage/update/{id}', ['as' => 'degree_manage.update','uses' => 'AdmAmwController@dgmUpdate']);

//------------------------------Amw : Degree - Waiver starts  --------------------------------------------

Route::any('amw/degree_manage/waiver/{id}', [
    'as' => 'degree_manage.waiver',
    'uses' => 'AdmAmwController@degreeWaiverIndex'
]);

Route::any('amw/degree_waiver/create/{degree_id}', [
    'as' => 'degree_waiver.create',
    'uses' => 'AdmAmwController@degreeWaiverCreate'
]);

Route::any('amw/degree_waiver/store', [
    'as' => 'degree_waiver.store',
    'uses' => 'AdmAmwController@degreeWaiverStore'
]);

Route::any('amw/degree_waiver/delete/{id}', [
    'as' => 'degree_waiver.delete',
    'uses' => 'AdmAmwController@degreeWaiverDelete'
]);

Route::any('amw/degree_waiver/delete/{id}','AdmAmwController@degreeWaiverDelete');

Route::any('amw/degree_manage/waiver_const/{id}', [
    'as' => 'degree_manage.waiver_const',
    'uses' => 'AdmAmwController@degWaiverConstIndex']);

//Time dependent

Route::any('amw/degree_manage/waiver_const/create/{degree_waiver_id}', [
    'as' => 'deg_waiver_time_const.create',
    'uses' => 'AdmAmwController@degWaiverTimeConstCreate'
]);

Route::any('amw/degree_manage/const/store', [
    'as' => 'deg_waiver_const.store',
    'uses' => 'AdmAmwController@degWaiverConstStore'
]);

Route::any('amw/degree_manage/waiver_const/edit/{id}', [
    'as' => 'deg_waiver_time_const.edit',
    'uses' => 'AdmAmwController@degWaiverTimeConstEdit'
]);

Route::post('amw/degree_manage/waiver_const/update/{id}', [
    'as' => 'deg_waiver_const.update',
    'uses' => 'AdmAmwController@degWaiverConstUpdate'
]);

//GPA dependent
Route::any('amw/degree_manage/gpa_const/create/{id}', [
    'as' => 'deg_waiver_gpa_const.create',
    'uses' => 'AdmAmwController@degWaiverGpaConstCreate'
]);

Route::any('amw/degree_manage/gpa_const/edit/{id}', [
    'as' => 'deg_waiver_gpa_const.edit',
    'uses' => 'AdmAmwController@degWaiverGpaConstEdit'
]);

Route::any('amw/degree_manage/waiver_const/delete/{id}','AdmAmwController@degWaiverConstDelete');

//--------------------------------  Amw : Waiver Management starts  --------------------------------------------

Route::any('amw/waiver_manage', ['as' => 'waiver_manage.index','uses' => 'AdmAmwController@waiverIndex']);
Route::any('amw/waiver_manage/create', ['as' => 'waiver_manage.create','uses' => 'AdmAmwController@waiverCreate']);
Route::any('amw/waiver_manage/store', ['as' => 'waiver_manage.store','uses' => 'AdmAmwController@waiverStore']);
Route::any('amw/waiver_manage/show/{id}', ['as' => 'waiver_manage.show','uses' => 'AdmAmwController@waiverShow']);
Route::any('amw/waiver_manage/edit/{id}', ['as' => 'waiver_manage.edit','uses' => 'AdmAmwController@waiverEdit']);
Route::any('amw/waiver_manage/update/{id}', ['as' => 'waiver_manage.update','uses' => 'AdmAmwController@waiverUpdate']);

// ----------------------------Public : Admission starts----------------------------------------------------------

//Degree_list
Route::any('admission/public/degree-offer-list',[
    'as' => 'admission.public.degree_offer_list',
    'uses' => 'AdmPublicController@degreeOfferList'
]);
//Degree Details
Route::any('admission/public/degree-offer-details/{degree_id}',
    ['as' => 'admission.public.degree_offer_details',
        'uses' => 'AdmPublicController@degreeOfferDetails']);

//Degree_applicant Save
Route::any('admission/applicant/degree-apply',
    ['as' => 'admission.applicant.degree_apply',
        'uses' => 'ApplicantController@degreeApply']);

//Add acm records_modal
Route::any('admission/public/admission/add-applicant-acm-docs',
    ['as' => 'admission.public.add-applicant-acm-docs',
        'uses' => 'AdmPublicController@addApplicantAcmDocsPublic']);

Route::any('admission/public/admission/store-applicant-acm-docs',
    ['as' => 'admission.public.store-applicant-acm-docs',
        'uses' => 'AdmPublicController@storeApplicantAcmDocsPublic']);

Route::any('admission/public/admission/edit-applicant-acm-docs/{id}',
    ['as' => 'admission.public.edit-applicant-acm-docs',
        'uses' => 'AdmPublicController@editApplicantAcmDocsPublic']);

Route::any('admission/public/admission/update-applicant-acm-docs/{id}',
    ['as' => 'admission.public.update-applicant-acm-docs',
        'uses' => 'AdmPublicController@updateApplicantAcmDocsPublic']);

Route::any('admission/public/admission/delete-applicant-acm-docs/{id}',
    ['as' => 'admission.public.delete-applicant-acm-docs',
        'uses' => 'AdmPublicController@deleteApplicantAcmDocsPublic']);

Route::any('admission/public/admission/applicant-certificate/{id}',
    ['as' => 'admission.public.applicant_certificate',
        'uses' => 'AdmPublicController@degreeOfferApplicantCertificate']);

Route::any('admission/public/admission/applicant-transcript/{id}',
    ['as' => 'admission.public.applicant_transcript',
        'uses' => 'AdmPublicController@degreeOfferApplicantTranscript']);

//Applicant Meta..................................................
Route::any('admission/public/admission/add-applicant-meta',
    ['as' => 'admission.public.add-applicant-meta',
        'uses' => 'AdmPublicController@addApplicantMetaInPublic']);

Route::any('admission/public/admission/store-applicant-meta',
    ['as' => 'admission.public.store-applicant-meta',
        'uses' => 'AdmPublicController@storeApplicantMetaInPublic']);

Route::any('admission/public/admission/edit-applicant-meta/{id}',
    ['as' => 'admission.public.edit-applicant-meta',
        'uses' => 'AdmPublicController@editApplicantMetaInPublic']);

Route::any('admission/public/admission/update-meta-info-applicant/{id}',
    ['as' => 'admission.public.update-meta-info-applicant',
        'uses' => 'AdmPublicController@updateApplicantMetaInPublic']);

//Applicant profile................................................

Route::any('admission/public/admission/add-applicant-profile',
    ['as' => 'admission.public.add-applicant-profile',
        'uses' => 'AdmPublicController@addApplicantProfileByApplicant']);

Route::any('admission/public/admission/store-applicant-profile',
    ['as' => 'admission.public.store-applicant-profile',
        'uses' => 'AdmPublicController@storeApplicantProfileByApplicant']);

Route::any('admission/public/admission/edit-applicant-profile/{id}',
    ['as' => 'admission.public.applicant-profile-edit',
        'uses' => 'AdmPublicController@editApplicantProfileByApplicant']);

Route::any('admission/public/admission/update-applicant-profile/{id}',
    ['as' => 'admission.public.update-applicant-profile',
        'uses' => 'AdmPublicController@updateApplicantProfileByApplicant']);

//Add more Degree
Route::any('admission/applicant/add-more-degree',
    ['as' => 'admission.applicant.add-degree',
        'uses' => 'ApplicantController@addMoreDegree']);




