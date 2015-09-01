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
Ratna
==================================================================
*/
//include("routes_academic_ra.php");

Route::any("academic/faculty", [
    "as"   => "academic/faculty",
    "uses" => "AcmFacultyController@index"
]);

Route::any("academic/faculty/create", [
    "as"   => "academic/faculty/create",
    "uses" => "AcmFacultyController@create"
]);

//>>>>>>>>>>>>>>>>> AMW START <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//*****************Amw Course Config(R)*********************

Route::get('academic/amw/config/',
    'AcmAmwController@config_index'
);
Route::any('academic/amw/course/show/{course_id}',[
    'as' => 'coursefind.show',
    'uses'=> 'AcmAmwController@find_course_info'
]);
Route::post('academic/amw/course/marks/save',
    'AcmAmwController@save_acm_course_config_data'
);
Route::any('academic/amw/config/show/{course_id}',[
    'as' => 'config.show',
    'uses'=> 'AcmAmwController@course_config_show'
]);
Route::any('marks-dist/{id}',[
    'as' => 'dist.show',
    'uses'=> 'AcmAmwController@show_config'
]);
Route::post('academic/amw/config/acmconfigdelete/ajax',
    'AcmAmwController@ajax_delete_acm_course_config'
);



//>>>>>>>>>>>>>>>>>>>> FACULTY START  <<<<<<<<<<<<<<<<<<<<<<<

//*****************Faculty Course Marks Distribution(R)**********

Route::any('academic/faculty/course/config',[
    'as' => 'academic.faculty.course.config',
    'uses'=> 'AcmFacultyController@index'
]);


Route::any('academic/faculty/course/marksdistitem/show/{cc_id}/{course_id}',[
    'as' => 'coursemarksdist.show',
    'uses'=> 'AcmFacultyController@course_marks_dist_show'
]);
Route::post('academic/faculty/marks/distribution/save',
    'AcmFacultyController@save_acm_marks_distribution_data'
);
Route::any('academic/faculty/marksdist/show/{course_id}/{cc_id}',[
    'as' => 'marksdistfind.show',
    'uses'=> 'AcmFacultyController@find_marksdist_info'
]);
Route::any('marks-item/{cc_id}',[
    'as' => 'marksdist.show',
    'uses'=> 'AcmFacultyController@marks_dist_show'
]);
Route::post('/marksdist/acmmarksdistdelete/ajax',
    'AcmFacultyController@ajax_delete_acm_marks_dist'
);

//****************Faculty All 5 Marks Distribution Item(R)*****************

Route::any('academic/faculty/marksdistitem/{marks_dist_id}/{cc_id}/{item_id}',
    'AcmFacultyController@item_index'
);
Route::post('academic/faculty/marksdistitem/save',
    'AcmFacultyController@save_marksdist_item_data'
);
Route::any('academic/faculty/show/{id}',[
    'as' => 'item.show',
    'uses'=> 'AcmFacultyController@item_show'
]);
Route::get('item-edit/{id}', [
    'as' => 'item.edit',
    'uses' => 'AcmFacultyController@item_edit'
]);
Route::any('class-update/{id}', [
    'as' => 'class/update',
    'uses' => 'AcmFacultyController@update_class'
]);
Route::post('academic/faculty/acadetailsdelete/ajax',
    'AcmFacultyController@ajax_delete_aca_academic_details'
);

//+-----assign Item to Student start(R)-----

Route::any('academic/faculty/marks-dist-item/assign/{acm_id}/{cc_id}/{mark_dist_id}',[
    'as' => 'item.assign',
    'uses'=> 'AcmFacultyController@item_assign'
]);

Route::any('batch/assign/{id}',[
    'as' => 'batch.assign',
    'uses'=> 'AcmFacultyController@assign_item'
]);

Route::any('batch/revoke/{id}',[
    'as' => 'batch.revoke',
    'uses'=> 'AcmFacultyController@revoke_item'
]);


Route::any('batch/batchAssignRevoke',[
    'as' => 'batch.batchAssignRevoke',
    'uses'=> 'AcmFacultyController@batch_assign_or_revoke_item'
]);


Route::any('assign/comments/{assign_std_id}/{acm_id}',[
    'as' => 'item.comments',
    'uses'=> 'AcmFacultyController@comments_assign_item'
]);
Route::post('comments/save',
    'AcmFacultyController@save_comments'
);
Route::any('item/evaluation/{assign_std_id}/{acm_id}',[
    'as' => 'item.evaluation',
    'uses'=> 'AcmFacultyController@evaluation'
]);

//............ Student .................
Route::any('academic/student/courses',
    ['as'=>'academic.student.courses.index',
        'uses'=>'AcmStudentController@acmCoursesIndex']);


Route::any('academic/student/enrollment',
    ['as'=>'academic.student.enrollment',
        'uses'=>'AcmStudentController@acmEnrollment']);

Route::any('academic/student/course-enrollment',
    ['as'=>'academic.student.course-enrollment',
        'uses'=>'AcmStudentController@acmCoursesEnrollment']);

Route::any('academic/student/course-enrollment/tution-fees/{year_title}/{semester_title}',
    ['as'=>'academic.student.course-enrollment.tution-fees',
        'uses'=>'AcmStudentController@acmCoursesTutionFees']);

Route::any('academic/student/courses/status/{id}/{value}',
    ['as'=>'academic.student.courses.status',
        'uses'=>'AcmStudentController@acmCoursesStatus']);

//Route::any('academic/student/courses/change-status/{id}/{value}',
//    ['as'=>'academic.student.courses.change-status',
//        'uses'=>'AcmStudentController@acmCoursesChangeStatus']);

Route::any('academic/student/courses/obtained-marks/{batch_course_id}',
    ['as'=>'academic.student.courses.obtained-marks',
        'uses'=>'AcmStudentController@showObtainedMarks']);

Route::any('academic/student/courses/class-view/{id}',
    ['as'=>'academic.student.courses.class-view',
        'uses'=>'AcmStudentController@viewClass']);

Route::any('academic/student/courses/assignment-view/{id}',
    ['as'=>'academic.student.courses.assignment-view',
        'uses'=>'AcmStudentController@viewAssignment']);

Route::any('academic/student/exam-enrollment/{batch_course_id}',
    ['as'=>'academic.student.exam-enrollment',
        'uses'=>'AcmStudentController@acmExamEnrollment']);

Route::any('academic/student/checkout/{year_title}/{semester_title}',
    ['as'=>'academic.student.checkout',
        'uses'=>'AcmStudentController@acmCheckout']);


