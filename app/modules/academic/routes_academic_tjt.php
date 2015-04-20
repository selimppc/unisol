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


