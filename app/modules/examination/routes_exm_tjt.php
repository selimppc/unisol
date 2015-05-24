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
//Examinations
Route::any('amw/exam-list',[
    'as' =>'amw.exam-list',
    'uses' => 'ExmAmwController@examList'
]);

Route::any('examination/amw/create-exam',[
    'as' =>'examination.amw.create-exam',
    'uses' => 'ExmAmwController@createExamination'
]);

Route::any('amw/store-exam',[
    'as' =>'amw.store-exam',
    'uses' => 'ExmAmwController@storeExamination'
]);

Route::any('amw/drop-down-courses',[
    'as' =>'amw.drop-down-courses',
    'uses' => 'ExmAmwController@createAjaxCourseList'
]);

Route::any('amw/view-exam-data/{id}', [
    'as' => 'amw.view-exam-data',
    'uses' => 'ExmAmwController@viewExamination'
]);

Route::any('amw/edit-exam-data/{id}', [
    'as' => 'amw.edit-exam-data',
    'uses' => 'ExmAmwController@editExamination'
]);
Route::any('amw/update-exam-data/{id}', [
    'as' => 'amw.update-exam-data',
    'uses' => 'ExmAmwController@updateExamination'
]);

Route::any('examination/amw/delete-exam-data/{id}', [
    'as' => 'examination.amw.delete-exam-data',
    'uses' => 'ExmAmwController@deleteExamination'
]);

Route::any('amw/view-exm-courses/{year_id}/{semester_id}',[
    'as' =>'amw.view-exm-courses',
    'uses' => 'ExmAmwController@viewExmCourseList'
]);

//Examiners
Route::any('amw/examiners/{exm_exam_list_id}/{year_id}/{semester_id}', [
    'as' => 'amw.examiners',
    'uses' => 'ExmAmwController@indexExaminers'
]);

Route::any('amw/examiners/create/{exm_exam_list_id}', [
    'as' => 'amw.examiners.create',
    'uses' => 'ExmAmwController@createExaminers'
]);

Route::any('examination/amw/examiners/store', [
    'as' => 'amw.examiners.store',
    'uses' => 'ExmAmwController@storeExaminers'
]);

Route::any('amw/revoke-examiners/{id}',[
    'as' => 'amw.revoke-examiners',
    'uses' => 'ExmAmwController@revokeExaminers'
]);

Route::any('amw/view-examiners/{id}', [
    'as' => 'amw.view-examiners',
    'uses' => 'ExmAmwController@viewExaminers'
]);

Route::any('amw/comments/examiners', [
    'as' => 'amw.comments-examiners',
    'uses' => 'ExmAmwController@commentsToExaminers'
]);

Route::any('amw/question-papers/{exm_exam_list_id}/{course_conduct_id}', [
    'as' => 'amw.question-papers',
    'uses' => 'ExmAmwController@indexQuestionPapers'
]);

Route::any('examination/amw/question-papers/create/{exm_exam_list_id}/{course_conduct_id}', [
    'as' => 'amw.question-papers.create',
    'uses' => 'ExmAmwController@createQuestionPapers'
]);

Route::any('amw/question-papers/store', [
    'as' => 'amw.question-papers.store',
    'uses' => 'ExmAmwController@storeQuestionPapers'
]);

Route::any('amw/view-question-paper/{id}', [
    'as' => 'amw.view-question-paper',
    'uses' => 'ExmAmwController@viewQuestionPaper'
]);

Route::any('amw/edit-question/{id}/{exm_exam_list_id}/{course_conduct_id}', [
    'as' => 'amw.edit-question',
    'uses' => 'ExmAmwController@editQuestionPaper'
]);

Route::any('amw/update-question/{id}', [
    'as' => 'amw.update-question',
    'uses' => 'ExmAmwController@updateQuestionPaper'
]);

Route::any('amw/assign-setter/{q_id}/{exm_exam_list_id}',[
    'as' => 'amw.assign-setter',
    'uses' => 'ExmAmwController@assignSetter'
]);

Route::any('amw/assign-evaluator/{q_id}/{exm_exam_list_id}',[
    'as' => 'amw.assign-evaluator',
    'uses' => 'ExmAmwController@assignEvaluator'
]);

Route::any('amw/assign-examiner-comments/{id}',[
    'as' => 'amw.assign-examiner-comments',
    'uses' => 'ExmAmwController@assignExaminerWithComments'
]);

Route::any('amw/question-list/{exm_question_id}', [
    'as' => 'amw.question-list',
    'uses' => 'ExmAmwController@questionList'
]);

Route::any('amw/view-question/{id}', [
    'as' => 'amw.view-question',
    'uses' => 'ExmAmwController@viewQuestionItem'
]);

Route::any('amw/qpe/{exm_exam_list_id}/{course_conduct_id}', [
    'as' => 'amw.qpe',
    'uses' => 'ExmAmwController@questionPaperEvaluation'
]);

Route::any('amw/student-list-qpe/{exm_question_id}',[
    'as' => 'amw.student-list-qpe',
    'uses' => 'ExmAmwController@studentListOfQpe'
]);

Route::any('amw/details-qpe/{student_user_id}/{question_id}',[
    'as' => 'amw.details-qpe',
    'uses' => 'ExmAmwController@viewDetailsOfQpe'
]);

