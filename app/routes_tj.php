<?php


//{-------------------Department--------------------}
Route::get('department/index','DepartmentController@index');

Route::get('department/create','DepartmentController@create');

Route::any('department/store','DepartmentController@store');

Route::any('department/delete/{id}','DepartmentController@delete');


Route::any('department/batchDelete','DepartmentController@batchDelete');

Route::any('department/edit/{id}','DepartmentController@edit');

Route::post('department/update/{id}','DepartmentController@update');



//{------------------ End Department Routes --------------------}