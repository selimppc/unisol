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

Route::any('knowledge-base/list',[
    'as' =>'knowledge-base.list',
    'uses' => 'CfoController@listOfKnowledgeBase'
]);

Route::any('ajax-search-kb',[
    'as' =>'ajax-search-kb',
    'uses' => 'CfoController@ajaxSearchKb'
]);

Route::any('details/knowledge-base/{id}',[
    'as' =>'details.knowledge-base',
    'uses' => 'CfoController@detailsKb'
]);

Route::any('ajax/knowledgebase/rating',[
    'as' =>'ajax.knowledgebase.rating',
    'uses' => 'CfoController@ajaxKbRating'
]);

Route::any('support-head',[
    'as' =>'support-head',
    'uses' => 'CfoController@supportHead'
]);

//Onsite-help-desk
Route::any('help-desk',[
    'as' =>'help-desk',
    'uses' => 'CfoAmwController@indexHelpDesk'
]);

Route::any('help-desk/create',[
    'as' =>'help-desk.create',
    'uses' => 'CfoAmwController@createHelpDesk'
]);

Route::any('store/help-desk',[
    'as' =>'store.help-desk',
    'uses' => 'CfoAmwController@storeHelpDesk'
]);

Route::any('help-desk/show/{id}',[
    'as' =>'help-desk.show',
    'uses' => 'CfoAmwController@showHelpDesk'
]);

Route::any('help-desk/edit/{id}',
    ['as'=>'help-desk.edit',
        'uses'=>'CfoAmwController@editHelpDesk']);

Route::any('help-desk/update/{id}',
    ['as'=>'help-desk.update',
        'uses'=>'CfoAmwController@updateHelpDesk']);

Route::any('help-desk/delete/{id}',
    ['as'=>'help-desk.delete',
        'uses'=>'CfoAmwController@deleteHelpDesk']);

Route::any('help-desk/batch-delete',[
    'as' =>'help-desk.batch-delete',
    'uses' => 'CfoAmwController@batchDelete'
]);

Route::any('help-desk/assigned_user',
    ['as'=>'help-desk.assigned_user',
        'uses'=>'CfoAmwController@assignedUserIndex']);
