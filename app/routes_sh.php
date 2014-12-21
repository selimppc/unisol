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