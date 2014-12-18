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