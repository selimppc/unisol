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

Route::any('academic/student/course-enrollment/{current_year_id}/{current_semester_id}',
    ['as'=>'academic.student.course-enrollment',
        'uses'=>'AcmStudentController@acmCoursesEnrollment']);