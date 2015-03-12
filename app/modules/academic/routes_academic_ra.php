<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */
//**********Mark_distribution_courses start******************
//*****************Amw Marks Dist Item*******************************************
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

//-------------Ajax delete for all 5 item start------------

Route::post('academic/faculty/acadetailsdelete/class_test/ajax',
    'AcmFacultyController@ajax_delete_aca_academic_details_class_test'
);

//+-----class test assign start-----

Route::any('academic/faculty/marks-dist-item/class_test/assign/{acm_id}/{cm_id}/{mark_dist_id}',[
    'as' => 'class/test.assign',
    'uses'=> 'AcmFacultyController@assign_class_test'
]);
Route::any('batch/assign',[
    'as' => 'batch.assign',
    'uses'=> 'AcmFacultyController@batch_assign_class_test'
]);
Route::any('class_test/assign/comments/{assign_std_id}',[
    'as' => 'classtest.comments',
    'uses'=> 'AcmFacultyController@comments_assign_class_test'
]);
Route::post('comments/save',
    'AcmFacultyController@save_comments'
);
//******************Faculty Marks Distribution Item Assignment****************

Route::any('academic/faculty/marks/dist/item/assignment/{marks_dist_id}/{cmid}',
    'AcmFacultyController@assignment_index'
);
Route::post('assignment/save',
    'AcmFacultyController@save_assignment_data'
);
Route::any('assignment/show/{id}',[
    'as' => 'assignment.show',
    'uses'=> 'AcmFacultyController@show_assignment'
]);
Route::get('assignment-edit/{id}', [
    'as' => 'assignment.edit',
    'uses' => 'AcmFacultyController@edit_assignment'
]);
Route::any('assignment-update/{id}',[
    'as' => 'assignment/update',
    'uses' => 'AcmFacultyController@update_assignment'
]);

//+-----Assignment assign start-----

Route::any('academic/faculty/marks-dist-item/assignment/assign/{acm_id}/{cm_id}/{mark_dist_id}',[
    'as' => 'assign.assign',
    'uses'=> 'AcmFacultyController@assign_assignment'
]);
Route::any('assignment/assign',[
    'as' => 'assignment/assign',
    'uses'=> 'AcmFacultyController@batch_assign_assignment'
]);
Route::any('assign/comments/{assign_std_id}',[
    'as' => 'assignment.comments',
    'uses'=> 'AcmFacultyController@comments_assign_assignment'
]);
Route::post('assignment/comments/save',
    'AcmFacultyController@save_assignment_comments'
);

//******************Faculty Marks Distribution Item Mid term start****************

Route::any('academic/faculty/marks/dist/item/midterm/{marks_dist_id}/{cmid}',
    'AcmFacultyController@midterm_index'
);
Route::post('midterm/save',
    'AcmFacultyController@save_midterm_data'
);
Route::any('midterm/show/{id}',[
    'as' => 'midterm.show',
    'uses'=> 'AcmFacultyController@show_midterm'
]);
Route::get('midterm-edit/{id}', [
    'as' => 'midterm.edit',
    'uses' => 'AcmFacultyController@edit_midterm'
]);
Route::any('midterm-update/{id}',[
    'as' => 'midterm/update',
    'uses' => 'AcmFacultyController@update_midterm'
]);

//+-----Mid term assign start-----

Route::any('academic/faculty/marks-dist-item/midterm/assign/{acm_id}/{cm_id}/{mark_dist_id}/{course_id}',[
    'as' => 'mid/term.assign',
    'uses'=> 'AcmFacultyController@assign_midterm'
]);
Route::any('midterm/assign',[
    'as' => 'midterm/assign',
    'uses'=> 'AcmFacultyController@batch_assign_midterm'
]);
Route::any('midterm/assign/comments/{assign_std_id}',[
    'as' => 'midterm.comments',
    'uses'=> 'AcmFacultyController@comments_assign_midterm'
]);
Route::post('midterm/comments/save',
    'AcmFacultyController@save_midterm_comments'
);

//******************Faculty Marks Distribution Item Final term start****************

Route::any('academic/faculty/marks/dist/item/final/term/{marks_dist_id}/{cmid}',
    'AcmFacultyController@final_term_index'
);
Route::post('final/term/save',
    'AcmFacultyController@save_fina_term_data'
);
Route::any('final/term/show/{id}',[
    'as' => 'finalterm.show',
    'uses'=> 'AcmFacultyController@show_final_term'
]);
Route::get('final-term-edit/{id}', [
    'as' => 'finalterm.edit',
    'uses' => 'AcmFacultyController@edit_final_term'
]);
Route::any('final-term-update/{id}',[
    'as' => 'final/term/update',
    'uses' => 'AcmFacultyController@update_final_term'
]);

//+-----Final term assign start-----

Route::any('academic/faculty/marks-dist-item/final/term/assign/{acm_id}/{cm_id}/{mark_dist_id}/{course_id}',[
    'as' => 'final/term.assign',
    'uses'=> 'AcmFacultyController@assign_final_term'
]);
Route::any('final/term/assign',[
    'as' => 'final/term/assign',
    'uses'=> 'AcmFacultyController@batch_assign_final_term'
]);
Route::any('final/term/assign/comments/{assign_std_id}',[
    'as' => 'finalterm.comments',
    'uses'=> 'AcmFacultyController@comments_assign_final_term'
]);
Route::post('finalterm/comments/save',
    'AcmFacultyController@save_final_term_comments'
);