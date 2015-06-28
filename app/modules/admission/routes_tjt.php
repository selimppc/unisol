<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/6/2015
 * Time: 10:16 AM
 */


Route::get('user','UserSignupController@Userindex');
Route::any('user/store','UserSignupController@Userstore');
Route::post('send/email', 'UserSignupController@send_users_email');
Route::get('register/verify/{verified_code}','UserSignupController@confirm');
Route::any('usersign/login', 'UserSignupController@Login');
Route::any('users/login', 'UserSignupController@UserLogin');
Route::any('usersign/logout', 'UserSignupController@usersLogout');
Route::any('usersign/dashboard', 'UserSignupController@Dashboard');

//forgot password

Route::any('/password_reset', 'UserSignupController@userPassword');
Route::any('/password_reset_mail', 'UserSignupController@userPasswordResetMail');
Route::any('password_reset_confirm/{reset_password_token}','UserSignupController@userPasswordResetConfirm');
Route::any('users/password_reset', 'UserSignupController@userPasswordReset'); //password reset view
Route::any('users/user_password_update', 'UserSignupController@userPasswordUpdate'); // password reset action

//forgot username..........
Route::any('user/username_reset', 'UserSignupController@usernameReset');
Route::any('user/username_reset_mail', 'UserSignupController@usernameResetMail');

//reset password
Route::any('user/reset_password', 'UserSignupController@userResetPassword');
Route::any('user/reset_password_update', 'UserSignupController@userResetPasswordUpdate');

//Cookie
Route::any('user/set_cookie', 'UserSignupController@setCookie');
Route::any('user/get_cookie', 'UserSignupController@getCookie');


//-------------------------------- Amw: Course Management starts-----------------------------------------------

Route::any('admission/amw/course_conduct/index',
             [ 'as'=> 'course_conduct.index',
             'uses' => 'AdmAmwController@courseConductIndex']);

Route::any('back','AdmAmwController@back');

Route::any('admission/amw/course_conduct/create',
            ['as'=>'course_conduct.create',
            'uses'=>'AdmAmwController@courseConductCreate']);

Route::any('course_manage/store','AdmAmwController@store');
Route::any('course_manage/show/{id}','AdmAmwController@show');
Route::any('course_manage/edit/{id}','AdmAmwController@edit');
Route::any('course_manage/update/{id}','AdmAmwController@update');
Route::any('course_manage/search','AdmAmwController@search');
Route::any('course_manage/search_view','AdmAmwController@cmSearchView');

//------------------------------ Amw : Degree Management starts  --------------------------------------------

Route::any('amw/degree_manage','AdmAmwController@dgmIndex');
Route::any('degree_manage/create','AdmAmwController@dgmCreate');
//Route::any('degree_manage/store','AdmAmwController@dgmStore');
Route::any('degree_manage/store', ['as' => 'degree_manage.store','uses' => 'AdmAmwController@dgmStore']);
Route::any('degree_manage/show/{id}', ['as' => 'degree_manage.show','uses' => 'AdmAmwController@dgmShow']);
Route::any('degree_manage/edit/{id}', ['as' => 'degree_manage.edit','uses' => 'AdmAmwController@dgmEdit']);
Route::any('degree_manage/update/{id}', ['as' => 'degree_manage.update','uses' => 'AdmAmwController@dgmUpdate']);

//------------------------------Amw : Degree - Waiver starts  --------------------------------------------

Route::any('amw/degree_manage/waiver/{id}', [
    'as' => 'degree_manage.waiver',
    'uses' => 'AdmAmwController@degreeWaiverIndex'
]);

Route::any('amw/degree_waiver/create/{degree_id}', [
    'as' => 'degree_waiver.create',
    'uses' => 'AdmAmwController@degreeWaiverCreate'
]);

Route::any('amw/degree_waiver/store', [
    'as' => 'degree_waiver.store',
    'uses' => 'AdmAmwController@degreeWaiverStore'
]);

Route::any('amw/degree_waiver/delete/{id}', [
    'as' => 'degree_waiver.delete',
    'uses' => 'AdmAmwController@degreeWaiverDelete'
]);

Route::any('amw/degree_waiver/delete/{id}','AdmAmwController@degreeWaiverDelete');

Route::any('amw/degree_manage/waiver_const/{id}', [
    'as' => 'degree_manage.waiver_const',
    'uses' => 'AdmAmwController@degWaiverConstIndex']);

//Time dependent

Route::any('amw/degree_manage/waiver_const/create/{degree_waiver_id}', [
    'as' => 'deg_waiver_time_const.create',
    'uses' => 'AdmAmwController@degWaiverTimeConstCreate'
]);

Route::any('amw/degree_manage/const/store', [
    'as' => 'deg_waiver_const.store',
    'uses' => 'AdmAmwController@degWaiverConstStore'
]);

Route::any('amw/degree_manage/waiver_const/edit/{id}', [
    'as' => 'deg_waiver_time_const.edit',
    'uses' => 'AdmAmwController@degWaiverTimeConstEdit'
]);

Route::post('amw/degree_manage/waiver_const/update/{id}', [
    'as' => 'deg_waiver_const.update',
    'uses' => 'AdmAmwController@degWaiverConstUpdate'
]);

//GPA dependent
Route::any('amw/degree_manage/gpa_const/create/{id}', [
    'as' => 'deg_waiver_gpa_const.create',
    'uses' => 'AdmAmwController@degWaiverGpaConstCreate'
]);

Route::any('amw/degree_manage/gpa_const/edit/{id}', [
    'as' => 'deg_waiver_gpa_const.edit',
    'uses' => 'AdmAmwController@degWaiverGpaConstEdit'
]);

Route::any('amw/degree_manage/waiver_const/delete/{id}','AdmAmwController@degWaiverConstDelete');

//--------------------------------  Amw : Waiver Management starts  --------------------------------------------

Route::any('amw/waiver_manage', ['as' => 'waiver_manage.index','uses' => 'AdmAmwController@waiverIndex']);
Route::any('amw/waiver_manage/create', ['as' => 'waiver_manage.create','uses' => 'AdmAmwController@waiverCreate']);
Route::any('amw/waiver_manage/store', ['as' => 'waiver_manage.store','uses' => 'AdmAmwController@waiverStore']);
Route::any('amw/waiver_manage/show/{id}', ['as' => 'waiver_manage.show','uses' => 'AdmAmwController@waiverShow']);
Route::any('amw/waiver_manage/edit/{id}', ['as' => 'waiver_manage.edit','uses' => 'AdmAmwController@waiverEdit']);
Route::any('amw/waiver_manage/update/{id}', ['as' => 'waiver_manage.update','uses' => 'AdmAmwController@waiverUpdate']);

// ----------------------------Public : Admission starts----------------------------------------------------------

//Degree_list
Route::any('admission/public/degree-offer-list',[
        'as' => 'admission.public.degree_offer_list',
        'uses' => 'AdmPublicController@degreeOfferList'
]);
//Degree Details
Route::any('admission/public/degree-offer-details/{degree_id}',
        ['as' => 'admission.public.degree_offer_details',
        'uses' => 'AdmPublicController@degreeOfferDetails']);

//Degree_applicant Save
Route::any('admission/applicant/degree-apply',
    ['as' => 'admission.applicant.degree_apply',
        'uses' => 'ApplicantController@degreeApply']);

//Add acm records_modal
Route::any('admission/public/admission/add-applicant-acm-docs',
    ['as' => 'admission.public.add-applicant-acm-docs',
        'uses' => 'AdmPublicController@addApplicantAcmDocsPublic']);

Route::any('admission/public/admission/store-applicant-acm-docs',
    ['as' => 'admission.public.store-applicant-acm-docs',
        'uses' => 'AdmPublicController@storeApplicantAcmDocsPublic']);

Route::any('admission/public/admission/edit-applicant-acm-docs/{id}',
    ['as' => 'admission.public.edit-applicant-acm-docs',
        'uses' => 'AdmPublicController@editApplicantAcmDocsPublic']);

Route::any('admission/public/admission/update-applicant-acm-docs/{id}',
    ['as' => 'admission.public.update-applicant-acm-docs',
        'uses' => 'AdmPublicController@updateApplicantAcmDocsPublic']);

Route::any('admission/public/admission/delete-applicant-acm-docs/{id}',
    ['as' => 'admission.public.delete-applicant-acm-docs',
        'uses' => 'AdmPublicController@deleteApplicantAcmDocsPublic']);

Route::any('admission/public/admission/applicant-certificate/{id}',
    ['as' => 'admission.public.applicant_certificate',
        'uses' => 'AdmPublicController@degreeOfferApplicantCertificate']);

Route::any('admission/public/admission/applicant-transcript/{id}',
    ['as' => 'admission.public.applicant_transcript',
        'uses' => 'AdmPublicController@degreeOfferApplicantTranscript']);

//Applicant Meta..................................................
Route::any('admission/public/admission/add-applicant-meta',
    ['as' => 'admission.public.add-applicant-meta',
        'uses' => 'AdmPublicController@addApplicantMetaInPublic']);

Route::any('admission/public/admission/store-applicant-meta',
    ['as' => 'admission.public.store-applicant-meta',
        'uses' => 'AdmPublicController@storeApplicantMetaInPublic']);

Route::any('admission/public/admission/edit-applicant-meta/{id}',
    ['as' => 'admission.public.edit-applicant-meta',
        'uses' => 'AdmPublicController@editApplicantMetaInPublic']);

Route::any('admission/public/admission/update-meta-info-applicant/{id}',
    ['as' => 'admission.public.update-meta-info-applicant',
        'uses' => 'AdmPublicController@updateApplicantMetaInPublic']);

//Applicant profile................................................

Route::any('admission/public/admission/add-applicant-profile',
    ['as' => 'admission.public.add-applicant-profile',
        'uses' => 'AdmPublicController@addApplicantProfileByApplicant']);

Route::any('admission/public/admission/store-applicant-profile',
    ['as' => 'admission.public.store-applicant-profile',
        'uses' => 'AdmPublicController@storeApplicantProfileByApplicant']);

Route::any('admission/public/admission/edit-applicant-profile/{id}',
    ['as' => 'admission.public.applicant-profile-edit',
        'uses' => 'AdmPublicController@editApplicantProfileByApplicant']);

Route::any('admission/public/admission/update-applicant-profile/{id}',
    ['as' => 'admission.public.update-applicant-profile',
        'uses' => 'AdmPublicController@updateApplicantProfileByApplicant']);

//Add more Degree
Route::any('admission/applicant/add-more-degree',
    ['as' => 'admission.applicant.add-degree',
        'uses' => 'ApplicantController@addMoreDegree']);





//{--------------------------------------- Degree -------------------------------------------------------------}
/*
Route::any('admission/amw/degree',
    ['as'=>'admission.amw.degree.index',
        'uses'=>'UserSignupController@admDegreeIndex']);


Route::any('admission/amw/degree/create',
    ['as'=>'common.amw.degree.create',
        'uses'=>'UserSignupController@admDegreeCreate']);


Route::any('admission/amw/degree/store',
    ['as'=>'admission.amw.degree.store',
        'uses'=>'UserSignupController@admDegreeStore']);


Route::any('admission/amw/degree/show/{id}',
    ['as'=>'admission.amw.degree.show',
        'uses'=>'UserSignupController@admDegreeShow']);

Route::any('admission/amw/degree/edit/{id}',
    ['as'=>'admission.amw.degree.edit',
        'uses'=>'UserSignupController@admDegreeEdit']);


Route::any('admission/amw/degree/update/{id}',
    ['as'=>'admission.amw.degree.update',
        'uses'=>'UserSignupController@admDegreeUpdate']);

Route::any('admission/amw/degree/delete/{id}',
    ['as'=>'admission.amw.degree.delete',
        'uses'=>'UserSignupController@admDegreeDelete']);


Route::any('admission/amw/degree/search',
    ['as'=>'admission.amw.degree.search',
        'uses'=>'UserSignupController@admDegreeSearch']);

//{---------------------------------------- Waiver ----------------------------------------------------------------}

Route::any('admission/amw/waiver',
    ['as'=>'admission.amw.waiver.index',
        'uses'=>'UserSignupController@admWaiverIndex']);

Route::any('admission/amw/waiver/create',
    ['as'=>'admission.amw.waiver.create',
        'uses'=>'UserSignupController@admWaiverCreate']);

Route::any('admission/amw/waiver/store',
    ['as'=>'admission.amw.waiver.store',
        'uses'=>'UserSignupController@admWaiverStore']);

Route::any('admission/amw/waiver/show/{id}',
    ['as'=>'admission.amw.waiver.show',
        'uses'=>'UserSignupController@admWaiverShow']);

Route::any('admission/amw/waiver/edit/{id}',
    ['as'=>'admission.amw.waiver.edit',
        'uses'=>'UserSignupController@admWaiverEdit']);

Route::any('admission/amw/waiver/update/{id}',
    ['as'=>'admission.amw.waiver.update',
        'uses'=>'UserSignupController@admWaiverUpdate']);

Route::any('admission/amw/waiver/delete/{id}',
    ['as'=>'admission.amw.waiver.delete',
        'uses'=>'UserSignupController@admWaiverDelete']);
//{---------------------------------- Batch-Waiver -------------------------------------------------------------}


Route::any('admission/amw/batch-waiver/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.index',
    'uses' => 'UserSignupController@batchWaiverIndex'
]);

Route::any('admission/amw/batch-waiver/create/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.create',
    'uses' => 'UserSignupController@batchWaiverCreate'
]);

Route::any('admission/amw/batch-waiver/store/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.store',
    'uses' => 'UserSignupController@batchWaiverStore'
]);

Route::any('admission/amw/batch-waiver/delete/{batch_id}', [
    'as' => 'admission.amw.batch-waiver.delete',
    'uses' => 'UserSignupController@batchWaiverDelete'
]);


//Route::any('admission/amw/batch-waiver',
//    ['as'=>'admission.amw.batch-waiver.index',
//         'uses'=>'UserSignupController@admBatchWaiverIndex']);
//
//Route::any('admission/amw/batch-waiver/create',
//    ['as'=>'admission.amw.batch-waiver.create',
//        'uses'=>'UserSignupController@admBatchWaiverCreate']);
//
//Route::any('admission/amw/batch-waiver/store',
//    ['as'=>'admission.amw.batch-waiver.store',
//        'uses'=>'UserSignupController@admBatchWaiverStore']);
//
//Route::any('admission/amw/batch-waiver/show/{id}',
//    ['as'=>'admission.amw.batch-waiver.show',
//        'uses'=>'UserSignupController@admBatchWaiverShow']);
//
//Route::any('admission/amw/batch-waiver/edit/{id}',
//    ['as'=>'admission.amw.batch-waiver.edit',
//        'uses'=>'UserSignupController@admBatchWaiverEdit']);
//
//Route::any('admission/amw/batch-waiver/update/{id}',
//    ['as'=>'admission.amw.batch-waiver.update',
//        'uses'=>'UserSignupController@admBatchWaiverUpdate']);
//
//Route::any('admission/amw/batch-waiver/delete/{id}',
//    ['as'=>'admission.amw.batch-waiver.delete',
//        'uses'=>'UserSignupController@admBatchWaiverDelete']);

//{----------------------------------Waiver Constraint---------------------------------------------------------------------}
Route::any('admission/amw/waiver-constraint/{batch_id}/{waiver_id}', [
    'as' => 'admission.amw.waiver-constraint.index',
    'uses' => 'UserSignupController@waiverConstraintIndex'
]);

Route::any('admission/amw/waiver-time-constraint/create/{batch_waiver_id}', [
    'as' => 'admission.amw.waiver-time-constraint.create',
    'uses' => 'UserSignupController@waiverTimeConstCreate'
]);
Route::any('admission/amw/waiver-gpa-constraint/create/{batch_waiver_id}', [
    'as' => 'admission.amw.waiver-gpa-constraint.create',
    'uses' => 'UserSignupController@waiverGpaConstCreate'
]);

Route::any('admission/amw/waiver-constraint/store', [
    'as' => 'admission.amw.waiver-constraint.store',
    'uses' => 'UserSignupController@waiverConstraintStore'
]);

Route::any('admission/amw/waiver-time-constraint/edit/{id}', [
    'as' => 'admission.amw.waiver-time-constraint.edit',
    'uses' => 'UserSignupController@waiverTimeConstEdit'
]);

Route::any('admission/amw/waiver-gpa-constraint/edit/{id}', [
    'as' => 'admission.amw.waiver-gpa-constraint.edit',
    'uses' => 'UserSignupController@waiverGpaConstEdit'
]);
Route::any('admission/amw/constraint-waiver/update/{id}', [
    'as' => 'admission.amw.waiver-constraint.update',
    'uses' => 'UserSignupController@waiverConstUpdate'
]);

Route::any('admission/amw/constraint-waiver/delete/{id}', [
    'as' => 'admission.amw.waiver-constraint.delete',
    'uses' => 'UserSignupController@waiverConstDelete'
]);
//{--------------------------------------- batch Education Constraint -------------------------------------------------------------}

Route::any('admission/amw/batch-education-constraint',
    ['as'=>'admission.amw.batch-edu-const.index',
        'uses'=>'UserSignupController@admBatchEduConstIndex']);

Route::any('admission/amw/batch-education-constraint/create',
    ['as'=>'admission.amw.batch-edu-const.create',
        'uses'=>'UserSignupController@admBatchEduConstCreate']);

Route::any('admission/amw/batch-education-constraint/store',
    ['as'=>'admission.amw.batch-edu-const.store',
        'uses'=>'UserSignupController@admBatchEduConstStore']);

Route::any('admission/amw/batch-education-constraint/show/{id}',
    ['as'=>'admission.amw.batch-edu-const.show',
        'uses'=>'UserSignupController@admBatchEduConstShow']);

Route::any('admission/amw/batch-education-constraint/edit/{id}',
    ['as'=>'admission.amw.batch-edu-const.edit',
        'uses'=>'UserSignupController@admBatchEduConstEdit']);

Route::any('admission/amw/batch-education-constraint/update/{id}',
    ['as'=>'admission.amw.batch-edu-const.update',
        'uses'=>'UserSignupController@admBatchEduConstUpdate']);

Route::any('admission/amw/batch-education-constraint/delete/{id}',
    ['as'=>'admission.amw.batch-edu-const.delete',
        'uses'=>'UserSignupController@admBatchEduConstDelete']);


//{------------------ Batch Applicant--------------------------------------------------------------------------------------------}

Route::any('admission/amw/batch-applicant/{id}',
    ['as'=>'admission.amw.batch-applicant.index',
        'uses'=>'UserSignupController@batchApplicantIndex']);

Route::any('admission/amw/batch-applicant/change/{id}',
    ['as'=>'admission.amw.batch-applicant.change',
        'uses'=>'UserSignupController@batchApplicantChangeStatus']);

Route::any('admission/amw/batch-applicant/update/{id}',
    ['as'=>'admission.amw.batch-applicant.update',
        'uses'=>'UserSignupController@batchApplicantUpdateStatus']);


Route::any('admission/amw/batch-applicant/apply/{id}',
    ['as'=>'admission.amw.batch-applicant.apply',
        'uses'=>'UserSignupController@batchApplicantApply']);

Route::any('admission/amw/batch-applicant/view-applicant/{id}/{batch_id}/{applicant_id}',
    ['as'=>'admission.amw.batch-applicant.view-applicant',
        'uses'=>'UserSignupController@batchApplicantView']);

*/

