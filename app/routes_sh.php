<?php

//degree-level
Route::get('degree_level/','DegreeLevelController@index');
Route::any('degree_level/create','DegreeLevelController@create');
Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);
Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);
Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);
Route::any('degree_level/update/{id}', ['as' => 'degreelevel.update','uses' => 'DegreeLevelController@update' ]);
Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);
Route::any('degree_level/batchDelete','DegreeLevelController@batchDelete');



//semester
Route::get('semester/','SemesterController@index');
Route::any('semester/create','SemesterController@create');
Route::any('semester/store', ['as' => 'semester.store', 'uses' => 'SemesterController@store' ]);
Route::get('semester/show/{id}', [ 'as' => 'semester.show', 'uses' => 'SemesterController@show' ]);
Route::any('semester/edit/{id}', ['as' => 'semester.edit', 'uses' => 'SemesterController@edit' ]);
Route::any('semester/update/{id}', ['as' => 'semester.update','uses' => 'SemesterController@update' ]);
Route::any('semester/destroy/{id}', ['as' => 'semester.destroy', 'uses' => 'SemesterController@destroy' ]);
Route::any('semester/batchDelete','SemesterController@batchDelete');


//Course
Route::get('course/','CourseController@index');
Route::any('course/create','CourseController@create');
Route::any('course/store', ['as' => 'course.store', 'uses' => 'CourseController@store' ]);
Route::get('course/show/{id}', [ 'as' => 'course.show', 'uses' => 'CourseController@show' ]);
Route::any('course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit' ]);
Route::any('course/update/{id}', ['as' => 'course.update','uses' => 'CourseController@update' ]);
Route::any('course/destroy/{id}', ['as' => 'course.destroy', 'uses' => 'CourseController@destroy' ]);
Route::any('course/batchDelete','CourseController@batchDelete');


//Course Type
Route::get('course_type/','CourseTypeController@index');
Route::any('course_type/create','CourseTypeController@create');
Route::any('course_type/store', ['as' => 'course_type.store', 'uses' => 'CourseTypeController@store' ]);
Route::get('course_type/show/{id}', [ 'as' => 'course_type.show', 'uses' => 'CourseTypeController@show' ]);
Route::any('course_type/edit/{id}', ['as' => 'course_type.edit', 'uses' => 'CourseTypeController@edit' ]);
Route::any('course_type/update/{id}', ['as' => 'course_type.update','uses' => 'CourseTypeController@update' ]);
Route::any('course_type/destroy/{id}', ['as' => 'course_type.destroy', 'uses' => 'CourseTypeController@destroy' ]);
Route::any('course_type/batchDelete','CourseTypeController@batchDelete');



//Target Role
Route::get('target_role/','TargetRoleController@index');
Route::any('target_role/create','TargetRoleController@create');
Route::any('target_role/store', ['as' => 'target_role.store', 'uses' => 'TargetRoleController@store' ]);
Route::get('target_role/show/{id}', [ 'as' => 'target_role.show', 'uses' => 'TargetRoleController@show' ]);
Route::any('target_role/edit/{id}', ['as' => 'target_role.edit', 'uses' => 'TargetRoleController@edit' ]);
Route::any('target_role/update/{id}', ['as' => 'target_role.update','uses' => 'TargetRoleController@update' ]);
Route::any('target_role/destroy/{id}', ['as' => 'target_role.destroy', 'uses' => 'TargetRoleController@destroy' ]);
Route::any('target_role/batchDelete','TargetRoleController@batchDelete');


//Target Role
Route::get('target_list_role/','TaskListRoleController@index');
Route::any('target_list_role/create','TaskListRoleController@create');
Route::any('target_list_role/store', ['as' => 'target_list_role.store', 'uses' => 'TaskListRoleController@store' ]);
Route::get('target_list_role/show/{id}', [ 'as' => 'target_list_role.show', 'uses' => 'TaskListRoleController@show' ]);
Route::any('target_list_role/edit/{id}', ['as' => 'target_list_role.edit', 'uses' => 'TaskListRoleController@edit' ]);
Route::any('target_list_role/update/{id}', ['as' => 'target_list_role.update','uses' => 'TaskListRoleController@update' ]);
Route::any('target_list_role/destroy/{id}', ['as' => 'target_list_role.destroy', 'uses' => 'TaskListRoleController@destroy' ]);
Route::any('target_list_role/batchDelete','TaskListRoleController@batchDelete');