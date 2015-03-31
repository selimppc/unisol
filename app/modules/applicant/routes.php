<?php

include("routes_applicant_tj.php");

Route::group( array('after' => 'auth'), function(){

//***********************Applicant Sign up Start(R)******************************

Route::any('/applicant',
    'ApplicantController@applicant_signup'
);

Route::any('applicant/store',
    'ApplicantController@applicant_signup_data_save'
);

Route::get('register/verify/{verified_code}',
    'ApplicantController@applicant_signup_confirm'
);

//********************Applicant Profile(R)*******************************

Route::any('applicant/profile/create',
    'ApplicantController@applicantProfileCreate'
);

Route::any('applicant/profile/{id}',
        'ApplicantController@applicant_profile_index'
);

Route::any('applicant/profile/store',
    'ApplicantController@applicantProfileStore'
);

Route::any('applicant/profile/edit/{id}',
    'ApplicantController@editApplicantProfile'
);

Route::post('applicant/profile/update/{id}',
    'ApplicantController@updateApplicantProfile'
);

Route::any('applicant/profile_image/edit/{id}',
    'ApplicantController@editProfileImage'
);
Route::any('applicant/profile_image/update/{id}',
    'ApplicantController@updateProfileImage'
);

//*********************Extra Curricular Activities(R)*************************

Route::any('apt/extra_curricular/index',
    'ApplicantController@extraCurricularIndex'
);

Route::any('applicant/extra_curricular/create','ApplicantController@extraCurricularCreate'
);

Route::any('applicant/extra_curricular_store','ApplicantController@applicantExtraCurricularStore'
);

Route::any('applicant/extra_curricular/edit/{id}','ApplicantController@editExtraCurricular'
);

Route::post('applicant/extra_curricular/update/{id}','ApplicantController@updateExtraCurricular'
);

//******************Applicant Supporting Docs(R)*************************

Route::any('apt/supporting_docs/index',
    'ApplicantController@sDocsIndex'
);
Route::any("apt/supporting_docs/view/{doc_type}/{sdoc_id}", [
    "as"   => "applicant.supporting_docs.view",
    "uses" => "ApplicantController@sDocsView"
]);

Route::any('apt/supporting_docs/store',
    'ApplicantController@sDocsStore'
);

//****************applicant miscellaneous_info(R)************************

Route::any('apt/misc_info/index',
    'ApplicantController@miscInfoIndex'
);
Route::any('apt/misc_info/create',
    'ApplicantController@miscInfoCreate'
);

Route::any('apt/misc_info/store',
    'ApplicantController@miscInfoStore'
);

Route::any('apt/misc_info/edit/{id}',
    'ApplicantController@miscInfoEdit'
);

Route::any('apt/misc_info/update/{id}',
    'ApplicantController@miscInfoUpdate'
);

//********************Applicant academic records(R)**********************

Route::any('apt/acm_records/index',
    'ApplicantController@acmRecordsIndex'
);

Route::any('apt/acm_records/create',
    'ApplicantController@acmRecordsCreate'
);

Route::any('apt/acm_records/store',
    'ApplicantController@acmRecordsStore'
);

Route::any('apt/acm_records/show/{id}',
    'ApplicantController@acmRecordsShow'
);

Route::any('apt/acm_records/edit/{id}',
    'ApplicantController@acmRecordsEdit'
);
Route::any('apt/acm_records/update/{id}',
    'ApplicantController@acmRecordsUpdate'
);
Route::any('apt/acm_records/delete/{id}',
    'ApplicantController@academicDelete'
);

// *********************Applicant Meta Information(R)*********************

Route::any('apt/personal_info/index',
    'ApplicantController@personalInfoIndex'
);

Route::any('apt/personal_info/create',
    'ApplicantController@personalInfoCreate'
);

Route::any('apt/personal_info/store',
    'ApplicantController@personalInfoStore'
);

Route::any('apt/personal_info/edit/{id}',
    'ApplicantController@personalInfoEdit'
);

Route::any('apt/personal_info/update/{id}',
    'ApplicantController@personalInfoUpdate'
);

});