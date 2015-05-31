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

    Route::any('amw/category/index',[
        'as' => 'amw.category.index',
        'uses'=> 'RnCAmwController@indexCategory'
    ]);

    Route::any('amw/config/index',[
        'as' => 'amw.config.index',
        'uses'=> 'RnCAmwController@indexConfig'
    ]);

    Route::any('amw/publisher/index',[
        'as' => 'amw.publisher.index',
        'uses'=> 'RnCAmwController@indexPublisher'
    ]);
    Route::any('amw/research-paper/index',[
        'as' => 'amw.research-paper.index',
        'uses'=> 'RnCAmwController@indexResearchPaper'
    ]);



});

