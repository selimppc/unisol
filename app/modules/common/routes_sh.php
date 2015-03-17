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




Route::any('common/adm_test_subject/view/{id}',
    ['as'=>'common.adm_test_subject.show',
        'uses'=>'AdmTestSubjectController@admTestSubjectView']);

Route::any('common/adm_test_subject/edit/{id}',
    ['as'=>'common.adm_test_subject.edit',
        'uses'=>'AdmTestSubjectController@admTestSubjectEdit']);

Route::any('common/adm_test_subject/update/{id}',
    ['as'=>'common.adm_test_subject.update',
        'uses'=>'AdmTestSubjectController@admTestSubjectUpdate']);

Route::any('common/adm_test_subject/delete/{id}',
    ['as'=>'common.adm_test_subject.delete',
        'uses'=>'AdmTestSubjectController@admTestSubjectDelete']);




Route::any('common/exm_center/batch_delete',
    ['as'=>'common.exm_center.batch_delete',
        'uses'=>'ExamCenterController@exmCenterBatchDelete']);

Route::any('common/exm_center/update/{id}',
    ['as'=>'common.exm_center.update',
        'uses'=>'ExamCenterController@exmCenterUpdate']);