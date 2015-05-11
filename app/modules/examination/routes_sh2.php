<?php
//AMW ROUTE CONFIGURATION




//FACULTY ROUTE CONFIGURATION
Route::any('examination/faculty/examination-list',[
    'as' =>'examination/faculty/examination-list',
    'uses' => 'ExmFacultyController@examinationList'
]);
