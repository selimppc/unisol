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
    'as' => 'faculty.examination-list.change-status-to-deny',
    'uses' => 'ExmFacultyController@changeStatusToDenyByFacultyEXM'
]);


Route::any('faculty/examination-list/change-status-to-accept/{id}',[
    'as' => 'faculty.admission-test.change-status-to-accept',
    'uses' => 'ExmFacultyController@changeStatusToAcceptedByFacultyEXM'
]);






Route::any('faculty/exm-question-paper/{exm_list_id}',[
    'as' =>'faculty.exm-question-paper',
    'uses' => 'ExmFacultyController@questionPaper'
]);



