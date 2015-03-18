<?php
/*
 * Created by PhpStorm.
 * User: Ratna
 * Date: 18/3/2015
 * Time: 10:30 AM
 */

Route::any('admission/amw/degree_courses',
    'AdmAmwController@degree_courses_index'
);
Route::post('admission/amw/degree_courses/save',
    'AdmAmwController@degree_courses_save'
);
