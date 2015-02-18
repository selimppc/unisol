<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */

Route::get('/index','EnrollmentController@index');
//Applicant enrollment
Route::get('student/','EnrollmentController@create');
//Theory Class start
//class
Route::get('class/','TheoryclassController@class_index');
//**********Mark_distribution_courses start************
//*****************amw dist item*****************
Route::get('academic/amw/',
    'AcmAmwController@amw_index'
);
Route::any('academic/amw/save',
    'AcmAmwController@amw_save'
);
Route::get('academic/amw/edit/{id}', [
    'as' => 'amw.edit',
    'uses' => 'AcmAmwController@amw_edit'
]);
Route::any('academic/amw/update/{id}', [
    'as' => 'amw/update',
    'uses' => 'AcmAmwController@amw_update'
]);
Route::any('academic/amw/show/{id}',[
    'as' => 'amw.show',
    'uses'=> 'AcmAmwController@show_one'
]);
Route::get('academic/amw/delete/{id}',
    'AcmAmwController@amw_delete'
);
Route::any('academic/amw/batch/delete',
    'AcmAmwController@amw_batchdelete'
);
//*****************amw course config***************
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
Route::any('academic/amw/marks/dist/{id}',[
    'as' => 'marksdist.show',
    'uses'=> 'AcmAmwController@item_config_show'
]);
Route::post('academic/amw/config/acmconfigdelete/ajax',
    'AcmAmwController@ajax_delete_acm_course_config'
);
//******************Faculty marksdistribution***********
Route::get('academic/faculty/',
    'AcmFacultyController@index'
);
Route::any('academic/faculty/course/marksdistitem/show/{cm_id}',[
    'as' => 'coursemarksdist.show',
    'uses'=> 'AcmFacultyController@course_marks_dist_show'
]);
Route::post('academic/faculty/marks/distribution/save',
    'AcmFacultyController@save_acm_marks_distribution_data'
);

Route::any('academic/faculty/marksdist/show/{course_id}',[
    'as' => 'marksdistfind.show',
    'uses'=> 'AcmFacultyController@find_marksdist_info'
]);
Route::any('academic/faculty/marks/dist/{cm_id}',[
    'as' => 'marksdist.show',
    'uses'=> 'AcmFacultyController@marks_dist_show'
]);
Route::post('academic/faculty/marksdist/acmmarksdistdelete/ajax',
    'AcmFacultyController@ajax_delete_acm_marks_dist'
);
//******************Faculty marksdistribution item class***********
Route::get('academic/faculty/marksdistitem/class',
    'AcmFacultyController@class_index'
);
Route::post('academic/faculty/marksdistitem/class/save',
    'AcmFacultyController@save_marksdist_item_class_data'
);





