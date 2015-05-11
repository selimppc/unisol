<?php
//AMW ROUTE CONFIGURATION




//FACULTY ROUTE CONFIGURATION
Route::any('examination/faculty/index',[
    'as' =>'examination/faculty/index',
    'uses' => 'ExmFacultyController@index'
]);

Route::any('examination/faculty/viewQuestion/{id}', [
    'as' => 'examination.faculty.viewQuestion',
    'uses' => 'ExmFacultyController@viewQuestion'
]);

Route::any('examination/faculty/questionList',[
    'as' =>'examination/faculty/questionList',
    'uses' => 'ExmFacultyController@questionList'
]);

Route::any('examination/faculty/add_question_items/{qid}', [
    'as' => 'examination.faculty.add_question_items',
    'uses' => 'ExmFacultyController@add_question_items'
] );

Route::any('examination/faculty/viewQuestionItems/{id}', [
    'as' => 'examination.faculty.viewQuestionItems',
    'uses' => 'ExmFacultyController@viewQuestionItems'
]);

Route::any('examination/faculty/editQuestionItems/{id}', [
    'as' => 'examination.faculty.editQuestionItems',
    'uses' => 'ExmFacultyController@editQuestionItems'
]);

Route::any('examination/faculty/store_Question_Items',[
    'as' =>'examination/faculty/store_Question_Items',
    'uses' => 'ExmFacultyController@storeQuestionItems'
]);

Route::any('examination/faculty/updateQuestionItems/{id}', [
    'as' => 'examination.faculty.updateQuestionItems',
    'uses' => 'ExmFacultyController@updateQuestionItems'
]);

Route::any('examination/faculty/batchDelete',[
    'as' =>'examination/faculty/batchDelete',
    'uses' => 'ExmFacultyController@batchDelete'
]);

Route::any('examination/faculty/batchItemsDelete',[
    'as' =>'examination/faculty/batchItemsDelete',
    'uses' => 'ExmFacultyController@batchItemsDelete'
]);

Route::any('examination/faculty/batchOptionAnswerDelete',[
    'as' =>'examination/faculty/batchOptionAnswerDelete',
    'uses' => 'ExmFacultyController@batchOptionAnswerDelete'
]);

Route::any('examination/test',[
    'as' =>'examination/test',
    'uses' => 'ExaminationController@examinationTest'
]);


