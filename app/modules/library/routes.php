<?php
/*
|-----------------------
 * Created by PhpStorm.
 * User: ratna
 * Date: 19-May-15
 * Time: 1:43 PM
 */

Route::group(['prefix' => 'library'], function() {

    include("routes_lib_tjt.php");

    Route::get('/', function() {
        return 'Thank you so much!';
    });

    /**********Library Book Category Start****************/

    Route::get('book/category',
        'LibraryController@index'
    );
    Route::post('category/save',
        'LibraryController@storeCategory'
    );
    Route::any('category/view/{id}',[
        'as' => 'category.view',
        'uses'=> 'LibraryController@viewCategory'
    ]);
    Route::any('category/edit/{id}',[
        'as' => 'category.edit',
        'uses'=> 'LibraryController@editCategory'
    ]);
    Route::any('category/update/{id}', [
        'as' => 'category/update',
        'uses' => 'LibraryController@updateCategory'
    ]);
    Route::get('category/delete/{id}',
        'LibraryController@deleteCategory'
    );
    Route::any('category/batch/delete',
        'LibraryController@batchdeleteCategory'
    );
});


