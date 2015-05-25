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
    include("routes_sh.php");

    Route::get('/', function() {
        return 'Thank you so much!';
    });

   /**************One method for all index****************/
    Route::get('/book',
        'LibraryController@index'
    );
    /**********Library Book Category Start****************/
    Route::any('category/save',[
        'as' => 'category.save',
        'uses'=> 'LibraryController@storeCategory'
    ]);
    Route::any('category/view/{id}',[
        'as' => 'category.view',
        'uses'=> 'LibraryController@viewCategory'
    ]);
    Route::any('category/edit/{id}',[
        'as' => 'category.edit',
        'uses'=> 'LibraryController@editCategory'
    ]);
    Route::any('category/update/{id}', [
        'as' => 'category.update',
        'uses' => 'LibraryController@updateCategory'
    ]);
    Route::get('category/delete/{id}',
        'LibraryController@deleteCategory'
    );
    Route::any('category/batch/delete/{id}', [
        'as' => 'category.batch.delete',
        'uses' => 'LibraryController@batchdeleteCategory'
    ]);

    /**********Library Book Author Start****************/

  /*  Route::any('author/save',[
        'as' => 'author.save',
        'uses'=> 'LibraryController@storeAuthor'
    ]);
    Route::any('author/view/{id}',[
        'as' => 'author.view',
        'uses'=> 'LibraryController@viewAuthor'
    ]);
    Route::any('author/edit/{id}',[
        'as' => 'author.edit',
        'uses'=> 'LibraryController@editAuthor'
    ]);
    Route::any('author/update/{id}', [
        'as' => 'author.update',
        'uses' => 'LibraryController@updateAuthor'
    ]);
    Route::get('author/delete/{id}',
        'LibraryController@deleteAuthor'
    );
    Route::any('author/batch/delete/{id}', [
        'as' => 'author.batch.delete',
        'uses' => 'LibraryController@batchdeleteAuthor'
    ]);*/


});


