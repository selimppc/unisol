<?php

// Applicant

Route::any('applicant','ApplicantController@index');

Route::any('applicant/store','ApplicantController@store');

Route::get('register/verify/{verified_code}','ApplicantController@confirm');

Route::any('applicant/signin', 'ApplicantController@Login');

Route::any('applicant/login', 'ApplicantController@applicantLogin');

//Route::any('applicant/login', 'ApplicantController@applicantLogin');

Route::any('applicant/logout', 'ApplicantController@applicantLogout');

//Route::any('applicant','ApplicantController@index');

//Route::any('applicant/store','ApplicantController@store');

Route::any('applicant/dashboard', 'ApplicantController@Dashboard');

//Route::any('applicant/delete/{id}','ApplicantController@destroy');

//Route::any('roletask/delete/{id}','RoleTaskController@destroy');

//Route::any('applicant/edit/{id}','ApplicantController@edit');

//Route::post('applicant/update/{id}','ApplicantController@update');

Route::get('applicant/show/{id}', 'ApplicantController@show' );

Route::any('applicant/profile','ApplicantController@applicantProfile');

Route::any('applicant/meta_data','ApplicantController@applicantMetaData');//meta-data

//Extra_Curricular Activities.................................................................
Route::any('apt/extra_curricular/index','ApplicantController@extraCurricularIndex');

Route::any('applicant/extra_curricular/create','ApplicantController@applicantExtraCurricular');

Route::any('applicant/extra_curricular_store','ApplicantController@applicantExtraCurricularStore');

Route::any('applicant/extra_curricular/edit/{id}','ApplicantController@editExtraCurricular');

Route::post('applicant/extra_curricular/update/{id}','ApplicantController@updateExtraCurricular');

//Applicant_profile..........................................................................
Route::any('applicant/profile/create','ApplicantController@applicantProfileCreate');

Route::any('applicant/profile/store','ApplicantController@applicantProfileStore');

Route::any('applicant/profile/index','ApplicantController@applicantProfileIndex');

Route::any('applicant/profile/edit/{id}','ApplicantController@editApplicantProfile');

Route::post('applicant/profile/update/{id}','ApplicantController@updateApplicantProfile');

Route::any('applicant/profile_image/edit/{id}','ApplicantController@editProfileImage');

Route::any('applicant/profile_image/update/{id}','ApplicantController@updateProfileImage');

//  Applicant Supporting Docs...................................................................

Route::any('apt/supporting_docs/index','ApplicantController@sDocsIndex');

Route::any("apt/supporting_docs/view/{doc_type}/{sdoc_id}", [
    "as"   => "applicant.supporting_docs.view",
    "uses" => "ApplicantController@sDocsView"
]);

Route::any('apt/supporting_docs/store','ApplicantController@sDocsStore');

//applicant miscellaneous_info
Route::any('apt/misc_info/index','ApplicantController@miscInfoIndex');

Route::any('apt/misc_info/create','ApplicantController@miscInfoCreate');

Route::any('apt/misc_info/store','ApplicantController@miscInfoStore');

Route::any('apt/misc_info/edit/{id}','ApplicantController@miscInfoEdit');

Route::any('apt/misc_info/update/{id}','ApplicantController@miscInfoUpdate');

//Applicant academic records..........................................................................

Route::any('apt/acm_records/index','ApplicantController@acmRecordsIndex');

Route::any('apt/acm_records/create','ApplicantController@acmRecordsCreate');

Route::any('apt/acm_records/store','ApplicantController@acmRecordsStore');

Route::any('apt/acm_records/show/{id}','ApplicantController@acmRecordsShow');

Route::any('apt/acm_records/edit/{id}','ApplicantController@acmRecordsEdit');

Route::any('apt/acm_records/update/{id}','ApplicantController@acmRecordsUpdate');

Route::any('apt/acm_records/delete/{id}','ApplicantController@academicDelete');

// Applicant Personal Information............................................................
Route::any('apt/personal_info/index','ApplicantController@personalInfoIndex');

Route::any('apt/personal_info/create','ApplicantController@personalInfoCreate');

Route::any('apt/personal_info/store','ApplicantController@personalInfoStore');

Route::any('apt/personal_info/edit/{id}','ApplicantController@personalInfoEdit');

Route::any('apt/personal_info/update/{id}','ApplicantController@personalInfoUpdate');








