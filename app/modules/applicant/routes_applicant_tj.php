<?php

// Applicant

Route::any('applicant/index','ApplicantController@index');

Route::any('applicant/store','ApplicantController@store');

Route::get('register/verify/{verified_code}','ApplicantController@confirm');

Route::any('applicant/signin', 'ApplicantController@Login');

Route::any('applicant/login', 'ApplicantController@applicantLogin');

Route::any('applicant/logout', 'ApplicantController@applicantLogout');

Route::any('applicant','ApplicantController@index');

Route::any('applicant/store','ApplicantController@store');

Route::any('applicant/dashboard', 'ApplicantController@Dashboard');

//Route::any('applicant/delete/{id}','ApplicantController@destroy');

//Route::any('roletask/delete/{id}','RoleTaskController@destroy');

//Route::any('applicant/edit/{id}','ApplicantController@edit');

//Route::post('applicant/update/{id}','ApplicantController@update');

Route::get('applicant/show/{id}', 'ApplicantController@show' );

Route::any('applicant/profile','ApplicantController@applicantProfile');

Route::any('applicant/meta_data','ApplicantController@applicantMetaData');//meta-data

Route::any('applicant/extra_curricular','ApplicantController@applicantExtraCurricularActivities');

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

// Applicant Personal Information............................................................
Route::any('applicant/personal_info/create','ApplicantController@applicantPersonalInfoCreate');

Route::any('applicant/personal_info/store','ApplicantController@applicantPersonalInfoStore');

Route::any('applicant/personal_info/index','ApplicantController@applicantPersonalInfoIndex');

Route::any('applicant/personal_info/edit/{id}','ApplicantController@applicantPersonalInfoEdit');

Route::any('applicant/personal_info/update/{id}','ApplicantController@applicantPersonalInfoUpdate');

//  Applicant Supporting Docs...................................................................
Route::any('applicant/supporting_docs/index','ApplicantController@applicantSupportingDocsIndex');

Route::any('applicant/supporting_docs/create','ApplicantController@applicantSupportingDocsCreate');

Route::any('applicant/supporting_docs/store','ApplicantController@applicantSupportingDocsStore');

//Route::any('applicant/supporting_docs/view/{doc_type}/{sdoc_id}','as' => 'applicant/supporting_docs/view', 'uses' => 'ApplicantController@applicantSupportingDocsView');
Route::any("applicant/supporting_docs/view/{doc_type}/{sdoc_id}", [
    "as"   => "applicant.supporting_docs.view",
    "uses" => "ApplicantController@applicantSupportingDocsView"
]);
Route::any('applicant/supporting_docs/edit/{id}','ApplicantController@editApplicantGoalStatement');

Route::any('applicant/supporting_docs/update/{id}','ApplicantController@updateApplicantGoalStatement');

//Applicant supporting_docs........................................................................

Route::any('applicant/supporting_docs/add','ApplicantController@applicantGoalStatementAdd');

Route::any('applicant/supporting_docs/store','ApplicantController@applicantSupportingDocsStore');

//applicant miscellaneous_info
Route::any('applicant/miscellaneous_info/index','ApplicantController@applicantMiscellaneousInfoIndex');

Route::any('applicant/miscellaneous_info/create','ApplicantController@applicantMiscellaneousInfoCreate');

Route::any('applicant/miscInfoStore','ApplicantController@miscInfoStore');

Route::any('applicant/miscellaneous_info/edit/{id}','ApplicantController@miscInfoEdit');

Route::any('applicant/miscellaneous_info/update/{id}','ApplicantController@miscInfoUpdate');

//applicant academic records..........................................................................

Route::any('applicant/academic_records/index','ApplicantController@academicIndex');

Route::any('applicant/academic_records/create','ApplicantController@academicCreate');

Route::any('applicant/academic_records/store','ApplicantController@academicStore');








