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

    /*====================Book Category Start======================*/

    Route::get('book/category',
        'LibraryController@index'
    );
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

    /*==================Book Author Start=========================*/

    Route::get('book/author',
        'LibraryController@indexAuthor'
    );
    Route::any('author/save',[
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
    ]);


    /*=====================Book Publisher Start========================*/

    Route::get('book/publisher',
        'LibraryController@indexPublisher'
    );
    Route::any('publisher/save',[
        'as' => 'publisher.save',
        'uses'=> 'LibraryController@storePublisher'
    ]);
    Route::any('publisher/view/{id}',[
        'as' => 'publisher.view',
        'uses'=> 'LibraryController@viewPublisher'
    ]);
    Route::any('publisher/edit/{id}',[
        'as' => 'publisher.edit',
        'uses'=> 'LibraryController@editPublisher'
    ]);
    Route::any('publisher/update/{id}', [
        'as' => 'publisher.update',
        'uses' => 'LibraryController@updatePublisher'
    ]);
    Route::get('publisher/delete/{id}',
        'LibraryController@deletePublisher'
    );
    Route::any('publisher/batch/delete/{id}', [
        'as' => 'publisher.batch.delete',
        'uses' => 'LibraryController@batchdeletePublisher'
    ]);

    /*=======================Book Start==============================*/

    Route::get('book/',
        'LibraryController@indexBook'
    );
    Route::any('book/save',[
        'as' => 'book.save',
        'uses'=> 'LibraryController@storeBook'
    ]);
    Route::any('book/view/{id}',[
        'as' => 'book.view',
        'uses'=> 'LibraryController@viewBook'
    ]);
    Route::any('book/edit/{id}',[
        'as' => 'book.edit',
        'uses'=> 'LibraryController@editBook'
    ]);
    Route::any('book/update/{id}', [
        'as' => 'book.update',
        'uses' => 'LibraryController@updateBook'
    ]);
    Route::get('book/delete/{id}',
        'LibraryController@deleteBook'
    );
    Route::any('book/batch/delete/{id}', [
        'as' => 'book.batch.delete',
        'uses' => 'LibraryController@batchdeleteBook'
    ]);

    Route::any('book/download/{book_id}',[
        'as' =>'book.download',
        'uses' => 'LibraryController@bookDownload'
    ]);
    Route::any('book/read/{book_id}',[
        'as' =>'book.read',
        'uses' => 'LibraryController@bookRead'
    ]);

    /*=======================Book Transaction Start==============================*/

    Route::get('book/transaction',
        'LibraryController@index_book_transaction'
    );

    Route::any('create/book/transaction',[
        'as' =>'create.book.transaction',
        'uses' => 'LibraryController@create_book_transaction'
    ]);

    Route::post('book/transaction/save',[
        'as' => 'book-transaction-save',
        'uses'=> 'LibraryController@save_book_transaction'
    ]);

    Route::any('transaction-book-view/{id}', [
        'as' => 'transaction-book-view',
        'uses' => 'LibraryController@view_book_transaction'
    ]);

    Route::any('transaction-book-edit/{id}', [
        'as' => 'transaction-book-edit',
        'uses' => 'LibraryController@edit_book_transaction'
    ]);

    Route::any('transaction-book-update/{id}', [
        'as' => 'transaction-book-update',
        'uses' => 'LibraryController@update_book_transaction'
    ]);

    Route::any('transaction-book-destroy/{id}', [
        'as'   => 'transaction-book-destroy',
        'uses' => 'LibraryController@destroy_book_transaction'
    ]);

    /*=======================Book Transaction Financial Start==============================*/

    Route::any('book-transaction-financial/{id}', [
        'as' => 'book-transaction-financial',
        'uses' => 'LibraryController@create_book_transaction_financial'
    ]);


    Route::any('transaction-financial-save', [
        'as' => 'transaction-financial-save',
        'uses' => 'LibraryController@save_transaction_financial'
    ]);

   /* Route::post('transaction/financial/delete/ajax',
        'LibraryController@ajax_delete_financial'
    );*/

    Route::any('book-transaction-financial-status/{id}', [
        'as' => 'book-transaction-financial-status',
        'uses' => 'LibraryController@update_status'
    ]);

    Route::any('transaction-financial-returned-status/{id}', [
        'as' => 'transaction-financial-returned-status',
        'uses' => 'LibraryController@update_returned_status'
    ]);

});


