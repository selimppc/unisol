<?php
/*
 * Created by PhpStorm.
 * User: Ratna
 * Date: 18/3/2015
 * Time: 10:30 AM
 */

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
    'uses' => 'AdmAmwController@batch_data_save']);