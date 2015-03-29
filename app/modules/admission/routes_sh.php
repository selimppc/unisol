<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 3/29/2015
 * Time: 12:34 PM
 */




Route::any('admission/faculty/admission-test',[
    'as' => 'admission.faculty.admission-test',
    'uses' => 'AdmFacultyController@indexAdmissionTest'
]);