<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::get('/', function()
//{
//	return View::make('hello');
//});
//Route::get('/','HomeController@index');
Route::get('create/subject','SubjectController@Index');
Route::post('subject/save','SubjectController@save');
Route::any('subject/list','SubjectController@show');
Route::any('subject/batch/delete','SubjectController@batchdelete');
Route::get('subject/delete/{id}','SubjectController@delete');
Route::get('subject/editvalue', 'SubjectController@edit');
Route::post('subject/update/{id}', 'SubjectController@update');


Route::get('/','HomeController@index');


Route::get('degree_level/','DegreeLevelController@index');

Route::any('degree_level/create','DegreeLevelController@create');

Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);

Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);







Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);
Route::any('degree_level/update/{id}', ['as' => 'degreelevel.update','uses' => 'DegreeLevelController@update' ]);


Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);


Route::get('/','HomeController@index');


//{-------------------Department--------------------}
Route::get('department/index','DepartmentController@index');

Route::get('department/create','DepartmentController@create');

Route::any('department/store','DepartmentController@store');

Route::any('department/delete/{id}','DepartmentController@delete');


Route::any('department/batchDelete','DepartmentController@batchDelete');

Route::any('department/edit/{id}','DepartmentController@edit');

Route::post('department/update/{id}','DepartmentController@update');


//{------------------ End Department Routes --------------------}
