<?php
/**
 * Created by PhpStorm.
 * User: ratna
 * Date: 06-Jan-15
 * Time: 5:02 PM
 */

route::get('/index','EnrollmentController@index');

//Applicant enrollment
route::get('student/index','EnrollmentController@create');

//Theory Class start
  //class
route::get('class/index','TheoryclassController@class_index');

//Mark_distribution_courses start
 //amw
route::get('amw/index','MarkdistributionController@amw_index');
route::any('amw/save','MarkdistributionController@amw_save');
route::get('amw/show/{id}','MarkdistributionController@amw_show');
Route::any('amw/batch/delete','MarkdistributionController@amw_batchdelete');

