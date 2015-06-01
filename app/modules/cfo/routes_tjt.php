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
//CFO
Route::any('category',[
    'as' =>'category',
    'uses' => 'CfoController@index'
]);

Route::any('category/store',[
    'as' =>'category.store',
    'uses' => 'CfoController@storeCategory'
]);

Route::any('category/show/{id}',[
    'as' =>'category.show',
    'uses' => 'CfoController@showCategory'
]);

Route::any('edit/category/{id}',
    ['as'=>'edit.category',
        'uses'=>'CfoController@editCategory']);


Route::any('update/category/{id}',
    ['as'=>'update.category',
        'uses'=>'CfoController@updateCategory']);


Route::any('delete/category{id}', [
    'as' => 'delete.category',
    'uses' => 'CfoController@deleteCategory'
]);

//Knowledge

Route::any('knowledge-base',[
    'as' =>'knowledge-base',
    'uses' => 'CfoController@indexKnowledgeBase'
]);

Route::any('store/knowledge-base',[
    'as' =>'store.knowledge-base',
    'uses' => 'CfoController@storeKnowledgeBase'
]);

Route::any('knowledge-base/show/{id}',[
    'as' =>'knowledge-base.show',
    'uses' => 'CfoController@showKnowledgeBase'
]);

Route::any('delete/knowledge-base/{id}',
    ['as'=>'delete.knowledge-base',
        'uses'=>'CfoController@deleteKnowledgeBase']);

Route::any('edit/knowledge-base/{id}',
    ['as'=>'edit.knowledge-base',
        'uses'=>'CfoController@editKnowledgeBase']);

Route::any('update/knowledge-base/{id}',
    ['as'=>'update.knowledge-base',
        'uses'=>'CfoController@updateKnowledgeBase']);


