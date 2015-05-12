<?php
//AMW ROUTE CONFIGURATION




//FACULTY ROUTE CONFIGURATION
Route::any('examination/faculty/examination-list',[
    'as' =>'examination.faculty.examination-list',
    'uses' => 'ExmFacultyController@examinationList'
]);

Route::any('examination/faculty/examination-list/batchDelete',[
    'as' =>'examination.faculty.examination-list.batchDelete',
    'uses' => 'ExmFacultyController@examinationListBatchDelete'
]);

Route::any('examination/faculty/examination-list/change-status-to-deny/{id}',[
    'as' => 'examination.faculty.examination-list.change-status-to-deny',
    'uses' => 'ExmFacultyController@changeStatustoDenyByFacultyEXM'
]);


Route::any('examination/faculty/examination-list/change-status-to-accept/{id}',[
    'as' => 'examination.faculty.admission-test.change-status-to-accept',
    'uses' => 'ExmFacultyController@changeStatusToAcceptedByFacultyEXM'
]);






Route::any('examination/faculty/exm-question-paper/{exm_list_id}',[
    'as' =>'examination.faculty.exm-question-paper',
    'uses' => 'ExmFacultyController@questionPaper'
]);



