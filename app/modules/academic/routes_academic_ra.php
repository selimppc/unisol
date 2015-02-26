<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */
//**********Mark_distribution_courses start******************
//*****************Amw Dist Item*******************************************
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
//*****************Amw Course Config**************************************
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
//******************Faculty Marks Distribution*****************************
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
Route::any('marks-item/{cm_id}',[
    'as' => 'marksdist.show',
    'uses'=> 'AcmFacultyController@marks_dist_show'
]);
Route::post('academic/faculty/marksdist/acmmarksdistdelete/ajax',
    'AcmFacultyController@ajax_delete_acm_marks_dist'
);
//******************Faculty Marks Distribution Item Class*****************
Route::any('academic/faculty/marksdistitem/class/{marks_dist_id}/{cmid}',
    'AcmFacultyController@class_index'
);
Route::post('academic/faculty/marksdistitem/class/save',
    'AcmFacultyController@save_marksdist_item_class_data'
);
Route::any('academic/faculty/class/show/{id}',[
    'as' => 'class.show',
    'uses'=> 'AcmFacultyController@show_class'
]);
Route::get('class-edit/{id}', [
    'as' => 'class.edit',
    'uses' => 'AcmFacultyController@edit_class'
]);
Route::any('class-update/{id}', [
    'as' => 'class/update',
    'uses' => 'AcmFacultyController@update_class'
]);
Route::post('academic/faculty/acadetailsdelete/ajax',
    'AcmFacultyController@ajax_delete_aca_academic_details'
);
//******************Faculty Marks Distribution Item Class Test*****************
Route::any('academic/faculty/marks/dist/item/class_test/{marks_dist_id}/{cmid}',
    'AcmFacultyController@class_test_index'
);
Route::post('class_test/save',
    'AcmFacultyController@save_class_test_data'
);
Route::any('class_test/show/{id}',[
    'as' => 'class_test.show',
    'uses'=> 'AcmFacultyController@show_class_test'
]);
Route::get('class_test-edit/{id}', [
    'as' => 'class_test.edit',
    'uses' => 'AcmFacultyController@edit_class_test'
]);
Route::any('class_test-update/{id}', [
    'as' => 'class_test/update',
    'uses' => 'AcmFacultyController@update_class_test'
]);
Route::post('academic/faculty/acadetailsdelete/class_test/ajax',
    'AcmFacultyController@ajax_delete_aca_academic_details_class_test'
);
//**********class test assign start*************
Route::any('academic/faculty/marks-dist-item/class_test/assign/{acm_id}/{cm_id}/{mark_dist_id}',[
    'as' => 'class/test.assign',
    'uses'=> 'AcmFacultyController@assign_class_test'
]);









//******************Faculty Marks Distribution Item Assignment*****************