<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */
//**********Mark_distribution_courses start******************
//*****************Amw Marks Dist Item*************************
/*
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
);*/


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

Route::get('academic/faculty/course/config',
    'AcmFacultyController@index'
);
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
Route::post('academic/faculty/marksdist/acmmarksdistdelete/ajax',
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
Route::any('batch/assign',[
    'as' => 'batch.assign',
    'uses'=> 'AcmFacultyController@batch_assign_item'
]);
Route::any('class_test/assign/comments/{assign_std_id}/{acm_id}',[
    'as' => 'item.comments',
    'uses'=> 'AcmFacultyController@comments_assign_item'
]);
Route::post('comments/save',
    'AcmFacultyController@save_comments'
);
