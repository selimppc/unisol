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
Route::group(['prefix' => 'rnc'], function() {

    Route::get('/', function() {
        return 'Thank you so much!';
    });

//Route for AMW User
    // Category

    Route::any('amw/category/index',[
        'as' => 'amw.category.index',
        'uses'=> 'RnCAmwController@indexCategory'
    ]);

    Route::any('amw/category/add/{id}',[
        'as' => 'amw.category.add',
        'uses'=> 'RnCAmwController@addCategory'
    ]);

    Route::any('amw/category/store',[
        'as' => 'amw.category.store',
        'uses'=> 'RnCAmwController@storeCategory'
    ]);


    Route::any('amw/category/show/{id}',[
        'as' => 'amw.category.show',
        'uses'=> 'RnCAmwController@showCategory'
    ]);

    Route::any('amw/category/edit/{id}',[
        'as' => 'amw.category.edit',
        'uses'=> 'RnCAmwController@editCategory'
    ]);

    Route::any('amw/category/update/{id}',[
        'as' => 'amw.category.update',
        'uses'=> 'RnCAmwController@updateCategory'
    ]);

    Route::any('amw/category/delete/{id}',[
        'as' => 'amw.category.delete',
        'uses'=> 'RnCAmwController@deleteCategory'
    ]);

    Route::any('amw/category/batch-delete',[
        'as' => 'amw.category.batch-delete',
        'uses'=> 'RnCAmwController@batchDeleteCategory'
    ]);


    // Config
    Route::any('amw/config/index',[
        'as' => 'amw.config.index',
        'uses'=> 'RnCAmwController@indexConfig'
    ]);

    Route::any('amw/config/add/{id}',[
        'as' => 'amw.config.add',
        'uses'=> 'RnCAmwController@addConfig'
    ]);

    Route::any('amw/config/store',[
        'as' => 'amw.config.store',
        'uses'=> 'RnCAmwController@storeConfig'
    ]);


    Route::any('amw/config/show/{id}',[
        'as' => 'amw.config.show',
        'uses'=> 'RnCAmwController@showConfig'
    ]);

    Route::any('amw/config/edit/{id}',[
        'as' => 'amw.config.edit',
        'uses'=> 'RnCAmwController@editConfig'
    ]);

    Route::any('amw/config/update/{id}',[
        'as' => 'amw.config.update',
        'uses'=> 'RnCAmwController@updateConfig'
    ]);

    Route::any('amw/config/delete/{id}',[
        'as' => 'amw.config.delete',
        'uses'=> 'RnCAmwController@deleteConfig'
    ]);

    Route::any('amw/config/batch-delete',[
        'as' => 'amw.config.batch-delete',
        'uses'=> 'RnCAmwController@batchDeletConfig'
    ]);




    // Publisher

    Route::any('amw/publisher/index',[
        'as' => 'amw.publisher.index',
        'uses'=> 'RnCAmwController@indexPublisher'
    ]);


    // Research Paper
    Route::any('amw/research-paper/index',[
        'as' => 'amw.research-paper.index',
        'uses'=> 'RnCAmwController@indexResearchPaper'
    ]);



});

