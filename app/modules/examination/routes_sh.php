<?php
//AMW ROUTE CONFIGURATION


//Route::any('examination/amw/storeQuestionPaper','ExmAmwController@storeQuestionPaper');

Route::any('examination/amw/viewQuestion/{id}', [
    'as' => 'examination.amw.viewQuestion',
    'uses' => 'ExmAmwController@viewQuestion'
]);

Route::any('examination/amw/create',[
    'as' =>'examination/amw/create',
    'uses' => 'ExmAmwController@createQuestionPaper'
]);

Route::any('examination/amw/store',[
    'as' =>'examination/amw/store',
    'uses' => 'ExmAmwController@storeQuestionPaper'
]);

Route::any('examination/amw/assignto',[
    'as' =>'examination/amw/assignto',
    'uses' => 'ExmAmwController@assignTo'
]);

Route::any('examination/amw/editQuestionPaper/{id}', [
    'as' => 'examination.amw.editQuestionPaper',
    'uses' => 'ExmAmwController@editQuestionPaper'
]);

Route::any('examination/amw/updateQuestionPaper/{id}', [
    'as' => 'examination.amw.updateQuestionPaper',
    'uses' => 'ExmAmwController@updateQuestionPaper'
]);

Route::any('examination/amw/questionList',[
    'as' =>'examination/amw/questionList',
    'uses' => 'ExmAmwController@questionList'
]);

Route::any('examination/amw/viewQuestionItems/{id}', [
    'as' => 'examination.amw.viewQuestionItems',
    'uses' => 'ExmAmwController@viewQuestionItems'
]);

Route::any('examination/amw/destroy/{id}', [
    'as' => 'examination.amw.destroy',
    'uses' => 'ExmAmwController@destroy'
]);

Route::any('examination/amw/batchDelete',[
    'as' =>'examination/amw/batchDelete',
    'uses' => 'ExmAmwController@batchDelete'
]);

Route::any('examination/amw/batchItemsDelete',[
    'as' =>'examination/amw/batchItemsDelete',
    'uses' => 'ExmAmwController@batchItemsDelete'
]);

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


