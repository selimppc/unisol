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

Route::get('/','HomeController@index');


Route::get('degree_level/','DegreeLevelController@index');

Route::any('degree_level/create','DegreeLevelController@create');

Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);



Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);

Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);

Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);

//
//// test
//Route::any('/','EmployeesController@index');
//Route::get('employee', [
//    'uses' => 'EmployeesController@index',
//    'as' => 'employees.index'
//]);
//
//Route::any('employee/create','EmployeesController@create');
//Route::any('employee/create', ['as' => 'employees.create', 'uses' => 'EmployeesController@create' ]);
//Route::any('employee/store', ['as' => 'employees.store', 'uses' => 'EmployeesController@store' ]);
//Route::any('employee/handleCreate', [ 'as' => 'employees.handleCreate', 'uses' => 'EmployeesController@handleCreate']);
//
//Route::any('employee/edit/{id}', ['as' => 'employees.edit', 'uses' => 'EmployeesController@edit' ]);
//Route::any('employee/update/{id}', ['as' => 'employees.update','uses' => 'EmployeesController@update' ]);
//
//Route::any('employee/delete/{id}', ['as' => 'employees.delete', 'uses' => 'EmployeesController@delete' ]);
//Route::any('employee/destroy/{id}', ['as' => 'employees.destroy', 'uses' => 'EmployeesController@destroy' ]);
//
//Route::get('employee/show/{id}', [ 'as' => 'employees.show', 'uses' => 'EmployeesController@show' ]);
//

