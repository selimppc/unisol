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

Route::any('applicant/profile/',
    'ApplicantController@applicantProfileIndex'
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
//********************Applicant Academic Records(R)**********************

Route::any('apt/acm_records/',
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

//*********************Applicant Meta Information/Personal Info(R)*********************

Route::any('apt/personal_info/',
    'ApplicantController@personalInfoIndex'
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

Route::any('applicant/personal_info_signature/edit/{id}',
    'ApplicantController@edit_signature'
);
Route::any('applicant/personal_info_signature/update/{id}',
    'ApplicantController@update_signature'
);

//******************Applicant Supporting Docs(R)*************************

Route::any('apt/supporting_docs/',
    'ApplicantController@sDocsIndex'
);
Route::any("apt/supporting_docs/view/{doc_type}/{sdoc_id}", [
    "as"   => "applicant.supporting_docs.view",
    "uses" => "ApplicantController@sDocsView"
]);

Route::any('apt/supporting_docs/store',
    'ApplicantController@sDocsStore'
);

//*********************Extra Curricular Activities(R)*************************

Route::any('apt/extra_curricular/',
    'ApplicantController@extraCurricularIndex'
);

Route::any('applicant/extra_curricular/create',
    'ApplicantController@extraCurricularCreate'
);

Route::any('applicant/extra_curricular_store','ApplicantController@applicantExtraCurricularStore'
);

Route::any('applicant/extra_curricular/show/{id}',[
    'as' => 'extra_curricular.show',
    'uses'=> 'ApplicantController@applicantExtraCurricularShow'
]);

Route::any('applicant/extra_curricular/edit/{id}',
    'ApplicantController@editExtraCurricular'
);

Route::post('applicant/extra_curricular/update/{id}',
    'ApplicantController@updateExtraCurricular'
);

Route::get('applicant/extra-curricular/delete/{id}',
    'ApplicantController@applicantExtraCurricularDelete'
);

//****************Applicant Miscellaneous Info(R)************************

Route::any('apt/misc_info/',
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


});