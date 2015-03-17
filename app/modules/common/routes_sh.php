<?php

//........................................ADM TEST SUBJECT.......................................................

Route::any('common/adm_test_subject/index',[
    'as' => 'common.adm_test_subject.index',
    'uses' => 'AdmTestSubjectController@admTestSubjectIndex'
]);

Route::any('common/adm_test_subject/create',[
    'as'=>'common.adm_test_subject.create',
    'uses'=>'AdmTestSubjectController@admTestSubjectCreate'
]);

Route::any('common/adm_test_subject/store', [
    'as' => 'common.adm_test_subject.store',
    'uses' => 'AdmTestSubjectController@admTestSubjectStore'
]);

Route::any('common/adm_test_subject/view/{id}',[
    'as'=>'common.adm_test_subject.show',
        'uses'=>'AdmTestSubjectController@admTestSubjectView'
    ]);

Route::any('common/adm_test_subject/edit/{id}',[
    'as'=>'common.adm_test_subject.edit',
    'uses'=>'AdmTestSubjectController@admTestSubjectEdit'
]);

Route::any('common/adm_test_subject/update/{id}',[
    'as'=>'common.adm_test_subject.update',
    'uses'=>'AdmTestSubjectController@admTestSubjectUpdate'
]);

Route::any('common/adm_test_subject/delete/{id}',[
    'as'=>'common.adm_test_subject.delete',
    'uses'=>'AdmTestSubjectController@admTestSubjectDelete'
]);

Route::any('common/adm_test_subject/batchDelete',[
    'as'=>'common.adm_test_subject.batchDelete',
    'uses'=>'AdmTestSubjectController@admTestSubjectBatchDelete'
]);


//............................................Course...............................................................


Route::any('common/course/index',[
    'as' => 'common.course.index',
    'uses' => 'CourseController@index'
]);

Route::any('common/course/create',[
    'as' => 'common.course.create',
    'uses' => 'CourseController@create'
]);

Route::any('common/course/store', [
    'as' => 'common.course.store',
    'uses' => 'CourseController@store'
]);

Route::get('common/course/show/{id}', [
    'as' => 'common.course.show',
    'uses' => 'CourseController@show'
]);

Route::any('common/course/edit/{id}', [
    'as' => 'common.course.edit',
    'uses' => 'CourseController@edit'
]);

Route::any('common/course/update/{id}', [
    'as' => 'common.course.update',
    'uses' => 'CourseController@update'
]);

Route::any('common/course/destroy/{id}', [
    'as' => 'common.course.destroy',
    'uses' => 'CourseController@destroy'
]);

Route::any('common/course/batchDelete', [
    'as' => 'common.course.batchDelete',
    'uses' => 'CourseController@batchDelete'
]);