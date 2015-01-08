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
  //class start
route::get('class/index','TheoryclassController@class_index');
