<?php
//AMW ROUTE CONFIGURATION
Route::any('examination/amw/index','ExmAmwController@index');

Route::any('examination/amw/storeQuestionPaper','ExmAmwController@storeQuestionPaper');

Route::any('examination/amw/viewQuestion/{id}', [
    'as' => 'examination.amw.viewQuestion',
    'uses' => 'ExmAmwController@viewQuestion'
]);
Route::any('examination/amw/create','ExmAmwController@createQuestionPaper');

Route::any('examination/amw/store','ExmAmwController@storeQuestionPaper');

Route::any('examination/amw/assignto','ExmAmwController@assignTo');

Route::any('examination/amw/editQuestionPaper/{id}', [
    'as' => 'examination.amw.editQuestionPaper',
    'uses' => 'ExmAmwController@editQuestionPaper'
]);
Route::any('examination/amw/updateQuestionPaper/{id}', [
    'as' => 'examination.amw.updateQuestionPaper',
    'uses' => 'ExmAmwController@updateQuestionPaper' ]);

Route::any('examination/amw/questionList','ExmAmwController@questionList');

Route::any('examination/amw/viewQuestionItems/{id}', [
    'as' => 'examination.amw.viewQuestionItems',
    'uses' => 'ExmAmwController@viewQuestionItems' ]);

Route::any('examination/amw/destroy/{id}', ['as' => 'examination.amw.destroy', 'uses' => 'ExmAmwController@destroy' ]);

Route::any('examination/amw/batchDelete','ExmAmwController@batchDelete');

Route::any('examination/amw/batchItemsDelete','ExmAmwController@batchItemsDelete');



//FACULTY ROUTE CONFIGURATION
Route::any('examination/fct/index','ExmFacultyController@index');

Route::any('examination/fct/viewQuestion/{id}', [
    'as' => 'examination.fct.viewQuestion',
    'uses' => 'ExmFacultyController@viewQuestion'
]);

Route::any('examination/fct/questionList','ExmFacultyController@questionList');

Route::any('examination/fct/add_question_items/{qid}', [
    'as' => 'examination.fct.add_question_items',
    'uses' => 'ExmFacultyController@add_question_items'
] );

Route::any('examination/fct/viewQuestionItems/{id}', [
    'as' => 'examination.fct.viewQuestionItems',
    'uses' => 'ExmFacultyController@viewQuestionItems'
]);

Route::any('examination/fct/editQuestionItems/{id}', [
    'as' => 'examination.fct.editQuestionItems',
    'uses' => 'ExmFacultyController@editQuestionItems' ]);

Route::any('examination/fct/store_Question_Items','ExmFacultyController@storeQuestionItems');


Route::any('examination/fct/updateQuestionItems/{id}', [
    'as' => 'examination.fct.updateQuestionItems',
    'uses' => 'ExmFacultyController@updateQuestionItems'
]);

Route::any('examination/fct/batchDelete','ExmFacultyController@batchDelete');

Route::any('examination/fct/batchItemsDelete','ExmFacultyController@batchItemsDelete');

Route::any('examination/fct/batchOptionAnswerDelete','ExmFacultyController@batchOptionAnswerDelete');


