<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */

Route::get('/index','EnrollmentController@index');
//Applicant enrollment
Route::get('student/index','EnrollmentController@create');
//Theory Class start
//class
Route::get('class/index','TheoryclassController@class_index');
//Mark_distribution_courses start
//amw dist item
Route::get('amw/index',
    'MarkdistributionController@amw_index'
);
Route::any('amw/save',
    'MarkdistributionController@amw_save'
);
Route::get('amw/edit/{id}', [
    'as' => 'amw.edit',
    'uses' => 'MarkdistributionController@amw_edit'
]);
Route::any('amw/update/{id}', [
    'as' => 'amw/update',
    'uses' => 'MarkdistributionController@amw_update'
]);
Route::any('amw/show/{id}',[
    'as' => 'amw.show',
    'uses'=> 'MarkdistributionController@show_one'
]);
Route::get('amw/delete/{id}',
    'MarkdistributionController@amw_delete'
);
Route::any('amw/batch/delete',
    'MarkdistributionController@amw_batchdelete'
);

//amw course config
Route::get('amw/config/index',
    'MarkdistributionController@config_index'
);
Route::any('amw/course/show/{course_id}',[
    'as' => 'coursefind.show',
    'uses'=> 'MarkdistributionController@find_course_info'
]);
Route::post('amw/course/marks/save',
    'MarkdistributionController@save_acm_course_config_data'
);
Route::any('amw/config/show/{course_id}',[
    'as' => 'config.show',
    'uses'=> 'MarkdistributionController@course_config_show'
]);
Route::any('amw/marks/dist/{id}',[
    'as' => 'marksdist.show',
    'uses'=> 'MarkdistributionController@item_config_show'
]);
Route::post('amw/config/acmconfigdelete/ajax', 'MarkdistributionController@ajax_delete_acm_course_config'
);

//teacher
Route::get('academic/teacher/',
    'MarkdistributionController@teacher_index'
);







