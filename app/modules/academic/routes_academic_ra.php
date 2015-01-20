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
Route::get('amw/index','MarkdistributionController@amw_index');
Route::any('amw/save','MarkdistributionController@amw_save');
Route::get('amw/edit/{id}', ['as' => 'amw.edit','uses' => 'MarkdistributionController@amw_edit']);
Route::any('amw/update/{id}', ['as' => 'amw/update','uses' => 'MarkdistributionController@amw_update']);
Route::any('amw/show/{id}',['as' => 'amw.show', 'uses'=> 'MarkdistributionController@show_one']);
Route::get('amw/delete/{id}','MarkdistributionController@amw_delete');
Route::any('amw/batch/delete','MarkdistributionController@amw_batchdelete');

//amw course config
Route::get('amw/config/index','MarkdistributionController@config_index');
//Route::any('amw/config/save','MarkdistributionController@config_save');
//Route::get('amw/config/edit/{id}', ['as' => 'config.edit','uses' => 'MarkdistributionController@config_edit']);
//Route::any('amw/config/update/{id}', ['as' => 'config/update','uses' => 'MarkdistributionController@config_update']);
//Route::any('amw/config/show/{id}',['as' => 'config.show', 'uses'=> 'MarkdistributionController@config_show_one']);
//Route::get('amw/config/delete/{id}','MarkdistributionController@config_delete');
//Route::any('amw/config/batch/delete','MarkdistributionController@config_batchdelete');

//course
//Route::get('amw/course','MarkdistributionController@getCourse_list');

//teacher
Route::get('teacher/index','MarkdistributionController@teacher_index');






