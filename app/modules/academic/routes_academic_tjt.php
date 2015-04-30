<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2015
 * Time: 10:16 AM
 */


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

Route::any('academic/student/courses/change-status/{id}',
    ['as'=>'academic.student.courses.change-status',
        'uses'=>'AcmStudentController@acmCoursesChangeStatus']);

Route::any('academic/student/courses/obtained-marks/{batch_course_id}',
    ['as'=>'academic.student.courses.obtained-marks',
        'uses'=>'AcmStudentController@showObtainedMarks']);

Route::any('academic/student/courses/class-view/{id}',
    ['as'=>'academic.student.courses.class-view',
        'uses'=>'AcmStudentController@viewClass']);

Route::any('academic/student/courses/assignment-view/{id}',
    ['as'=>'academic.student.courses.assignment-view',
        'uses'=>'AcmStudentController@viewAssignment']);