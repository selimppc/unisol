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
    'uses' => 'CfoAmwController@index'
]);

Route::any('category/store',[
    'as' =>'category.store',
    'uses' => 'CfoAmwController@storeCategory'
]);

Route::any('category/show/{id}',[
    'as' =>'category.show',
    'uses' => 'CfoAmwController@showCategory'
]);

Route::any('edit/category/{id}',
    ['as'=>'edit.category',
        'uses'=>'CfoAmwController@editCategory']);


Route::any('update/category/{id}',
    ['as'=>'update.category',
        'uses'=>'CfoAmwController@updateCategory']);


Route::any('delete/category{id}', [
    'as' => 'delete.category',
    'uses' => 'CfoAmwController@deleteCategory'
]);

//KnowledgeBase

Route::any('knowledge-base',[
    'as' =>'knowledge-base',
    'uses' => 'CfoAmwController@indexKnowledgeBase'
]);

Route::any('store/knowledge-base',[
    'as' =>'store.knowledge-base',
    'uses' => 'CfoAmwController@storeKnowledgeBase'
]);

Route::any('knowledge-base/show/{id}',[
    'as' =>'knowledge-base.show',
    'uses' => 'CfoAmwController@showKnowledgeBase'
]);

Route::any('delete/knowledge-base/{id}',
    ['as'=>'delete.knowledge-base',
        'uses'=>'CfoAmwController@deleteKnowledgeBase']);

Route::any('edit/knowledge-base/{id}',
    ['as'=>'edit.knowledge-base',
        'uses'=>'CfoAmwController@editKnowledgeBase']);

Route::any('update/knowledge-base/{id}',
    ['as'=>'update.knowledge-base',
        'uses'=>'CfoAmwController@updateKnowledgeBase']);

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

//Support Head

Route::any('support-head/create',[
    'as' =>'support-head.create',
    'uses' => 'CfoController@createSupportHead'
]);

Route::any('support-head/store',[
    'as' =>'support-head.store',
    'uses' => 'CfoController@storeSupportHead'
]);

/*Route::any('support-head/mail-notification/{support_code}',[
    'as' =>'support-head.mail-notification',
    'uses' => 'CfoController@mailNotification'
]);*/

Route::any('support-head',[
    'as' =>'support-head.index',
    'uses' => 'CfoAmwController@cfoSupportIndex'
]);

Route::any('support-head/test',[
    'as' =>'support-head.test',
    'uses' => 'CfoAmwController@Test'
]);


Route::any('support-head/show/{id}',[
    'as' =>'support-head.show',
    'uses' => 'CfoAmwController@showSupportHead'
]);

Route::any('support-head/reply/{id}',[
    'as' =>'support-head.reply',
    'uses' => 'CfoAmwController@reply'
]);

Route::any('support-head/reply-to-user',[
    'as' =>'support-head.reply-to-user',
    'uses' => 'CfoAmwController@replyToUser'
]);

Route::any('support-head/support-data',[
    'as' =>'support-head.support-data',
    'uses' => 'CfoController@commentsToCfo'
]);

Route::any('support-head/response-by-user',[
    'as' =>'support-head.response-by-user',
    'uses' => 'CfoController@responseByUser'
]);

Route::any('support-head/change-status/{id}/{value}',[
    'as' =>'support-head.change-status',
    'uses' => 'CfoController@changeStatus'
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


