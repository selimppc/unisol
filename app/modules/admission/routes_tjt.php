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
Route::any('admission/public/degree_list',[
        'as' => 'admission.degree_list',
        'uses' => 'AdmPublicController@admDegreeList'
]);
//Degree Details
Route::any('admission/public/degree_details/{degree_id}',
        ['as' => 'admission.degree_details',
        'uses' => 'AdmPublicController@admDegreeApplicantDetails']);

//Degree_applicant Save
Route::any('admission/public/admission/degree_apt_save',
    ['as' => 'admission.degree_apt_save',
        'uses' => 'AdmPublicController@admDegreeApplicantSave']);

//Adm_applicant_profile
Route::any('admission/public/admission/apt_profile_details/{id}',
    ['as' => 'admission.apt_profile_details',
        'uses' => 'AdmPublicController@admDegAptProfileDetails']);

Route::any('admission/public/admission/adm_test_details/{id}',
    ['as' => 'admission.adm_test_details',
        'uses' => 'AdmPublicController@admTestDetails']);

//Adm_applicant checkout view
Route::any('admission/public/admission/checkout/',
    ['as' => 'admission.adm_checkout',
        'uses' => 'AdmPublicController@admDegAptCheckout']);


//{----------------------------------- Version:2 -> Degree Program -------------------------------------------------------------------}

Route::any('common/degree-program',
    ['as'=>'common.degree-program.index',
        'uses'=>'DegreeProgramController@degreeProgramIndex']);

Route::any('common/degree-program/create',
    ['as'=>'common.degree-program.create',
        'uses'=>'DegreeProgramController@degreeProgramCreate']);

Route::any('common/degree-program/store',
    ['as'=>'common.degree-program.store',
        'uses'=>'DegreeProgramController@degreeProgramStore']);


Route::any('common/degree-program/show/{id}',
    ['as'=>'common.degree-program.show',
        'uses'=>'DegreeProgramController@degreeProgramShow']);

Route::any('common/degree-program/edit/{id}',
    ['as'=>'common.degree-program.edit',
        'uses'=>'DegreeProgramController@degreeProgramEdit']);

Route::any('common/degree-program/update/{id}',
    ['as'=>'common.degree-program.update',
        'uses'=>'DegreeProgramController@degreeProgramUpdate']);

Route::any('common/degree-program/delete/{id}',
    ['as'=>'common.degree-program.delete',
        'uses'=>'DegreeProgramController@degreeProgramDelete']);

Route::any('common/degree-program/batch_delete',
    ['as'=>'common.degree-program.batch_delete',
        'uses'=>'DegreeProgramController@degreeProgramBatchDelete']);


//{-------------------------------Version:2 -> Course Type--------------------------------------------------------------------------}

Route::any('common/course-type',
        ['as'=>'common.course-type.index',
        'uses'=>'CourseTypeController@index']);


Route::any('common/course-type/create',
        ['as'=>'common.course-type.create',
        'uses'=>'CourseTypeController@create']);


Route::any('common/course-type/store',
        ['as'=>'common.course-type.store',
        'uses'=>'CourseTypeController@store']);


Route::any('common/course-type/show/{id}',
    ['as'=>'common.course-type.show',
        'uses'=>'CourseTypeController@show']);

Route::any('common/course-type/edit/{id}',
    ['as'=>'common.course-type.edit',
        'uses'=>'CourseTypeController@edit']);


Route::any('common/course-type/update/{id}',
    ['as'=>'common.course-type.update',
        'uses'=>'CourseTypeController@update']);


Route::any('common/course-type/delete/{id}',
    ['as'=>'common.course-type.delete',
        'uses'=>'CourseTypeController@delete']);

Route::any('common/course-type/batch-delete',
    ['as'=>'common.course-type.batch-delete',
        'uses'=>'CourseTypeController@batchDelete']);

//---------------------------------------Version : 2 Starts Here-----------------------------------------------------

//{--------------------------------------- Degree -------------------------------------------------------------}

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

Route::any('admission/amw/waiver-constraint/create/{batch_waiver_id}', [
    'as' => 'admission.amw.waiver-constraint.create',
    'uses' => 'UserSignupController@waiverTimeConstCreate'
]);

Route::any('admission/amw/waiver-constraint/store', [
    'as' => 'admission.amw.waiver-constraint.store',
    'uses' => 'UserSignupController@waiverConstraintStore'
]);
//{--------------------------------------- batch Education Constraint -------------------------------------------------------------}

Route::any('admission/amw/batch-edu-const',
    ['as'=>'admission.amw.batch-edu-const.index',
        'uses'=>'UserSignupController@admBatchEduConstIndex']);

Route::any('admission/amw/batch-edu-const/create',
    ['as'=>'admission.amw.batch-edu-const.create',
        'uses'=>'UserSignupController@admBatchEduConstCreate']);

Route::any('admission/amw/batch-edu-const/store',
    ['as'=>'admission.amw.batch-edu-const.store',
        'uses'=>'UserSignupController@admBatchEduConstStore']);

Route::any('admission/amw/batch-edu-const/show/{id}',
    ['as'=>'admission.amw.batch-edu-const.show',
        'uses'=>'UserSignupController@admBatchEduConstShow']);

Route::any('admission/amw/batch-edu-const/edit/{id}',
    ['as'=>'admission.amw.batch-edu-const.edit',
        'uses'=>'UserSignupController@admBatchEduConstEdit']);

Route::any('admission/amw/batch-edu-const/update/{id}',
    ['as'=>'admission.amw.batch-edu-const.update',
        'uses'=>'UserSignupController@admBatchEduConstUpdate']);

Route::any('admission/amw/batch-edu-const/delete/{id}',
    ['as'=>'admission.amw.batch-edu-const.delete',
        'uses'=>'UserSignupController@admBatchEduConstDelete']);

//{-----------------------------------------------------Batch Waiver--------------------------------------------------------------------------------------}

Route::any('admission/amw/batch-waiver/{id}', [
    'as' => 'admission.amw.batch-waiver.index',
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

//{-----------------------------------------------Batch Applicant--------------------------------------------------------------------------------------------}

Route::any('admission/amw/batch-apt/{id}',
    ['as'=>'admission.amw.batch-applicant.index',
        'uses'=>'UserSignupController@admBatchAptIndex']);

Route::any('admission/amw/batch-apt/status',
    ['as'=>'admission.amw.batch-apt.status',
        'uses'=>'UserSignupController@admBatchAptStatus']);









