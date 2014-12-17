<?php


Route::get('degree_level/','DegreeLevelController@index');

Route::any('degree_level/create','DegreeLevelController@create');

Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);

Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);







Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);
Route::any('degree_level/update/{id}', ['as' => 'degreelevel.update','uses' => 'DegreeLevelController@update' ]);


Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);

