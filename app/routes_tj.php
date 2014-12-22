<?php


//{-------------------Department--------------------}
Route::get('department/index','DepartmentController@index');

Route::get('department/create','DepartmentController@create');

Route::any('department/store','DepartmentController@store');

Route::any('department/delete/{id}','DepartmentController@delete');


Route::any('department/batchDelete','DepartmentController@batchDelete');

Route::any('department/edit/{id}','DepartmentController@edit');

Route::post('department/update/{id}','DepartmentController@update');

Route::get('department/show/{id}', 'DepartmentController@show' );


//{------------------ End Department Routes --------------------}

Route::any('degreeprogram/index','DegreeProgController@index');
Route::any('degreeprogram/store','DegreeProgController@store');

Route::any('degreeprogram/destroy/{id}','DegreeProgController@destroy');
Route::any('degreeprogram/edit/{id}','DegreeProgController@edit');
Route::post('degreeprogram/update/{id}','DegreeProgController@update');

Route::get('degreeprogram/show/{id}', 'DegreeProgController@show' );

//Route::any('degreeprogram/destroy/{id}', ['as' => 'degreeprogram.destroy', 'uses' => 'DegreeProgController@destroy' ]);














