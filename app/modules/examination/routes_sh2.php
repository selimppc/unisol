<?php
//AMW ROUTE CONFIGURATION




//FACULTY ROUTE CONFIGURATION
Route::any('faculty/examination-list',[
    'as' =>'faculty.examination-list',
    'uses' => 'ExmFacultyController@examinationList'
]);

Route::any('faculty/examination-list/batchDelete',[
    'as' =>'faculty.examination-list.batchDelete',
    'uses' => 'ExmFacultyController@examinationListBatchDelete'
]);

Route::any('faculty/examination-list/change-status-to-deny/{id}',[
    'as' =>'faculty.examination-list.change-status-to-deny',
    'uses' => 'ExmFacultyController@changeStatusToDeny'
]);

Route::any('faculty/examination-list/change-status-to-accept/{id}',[
    'as' =>'faculty.examination-list.change-status-to-accept',
    'uses' => 'ExmFacultyController@changeStatusToAccepted'
]);

Route::any('faculty/examination-list/view-examiner/{id}/{exm_list_id}',[
    'as' =>'faculty.examination-list.view-examiner',
    'uses' => 'ExmFacultyController@viewExaminer'
]);
//ok

Route::any('faculty/examination-list/save-examiner-comment',[
    'as' =>'faculty.examination-list.save-examiner-comment',
    'uses' => 'ExmFacultyController@saveExaminerComment'
]);




Route::any('faculty/exm-question-paper/{exm_list_id}',[
    'as' =>'faculty.exm-question-paper',
    'uses' => 'ExmFacultyController@questionPaper'
]);



