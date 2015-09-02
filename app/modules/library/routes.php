<?php
/*
|-----------------------
 * Created by PhpStorm.
 * User: ratna
 * Date: 19-May-15
 * Time: 1:43 PM
 */

Route::group(['prefix' => 'library'], function() {

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
        'uses' => 'LibraryController@update_purchase_status'
    ]);

    Route::any('transaction-financial-returned-status/{id}', [
        'as' => 'transaction-financial-returned-status',
        'uses' => 'LibraryController@update_returned_status'
    ]);

    Route::any('transaction-financial-delay-status/{id}', [
        'as' => 'transaction-financial-delay-status',
        'uses' => 'LibraryController@update_delay_status'
    ]);

    //Library : Faculty

    Route::any('faculty/book',[
        'as' =>'faculty.book',
        'uses' => 'LibFacultyController@index'
    ]);

    Route::any('faculty/add-book-to-cart/{book_id}',[
        'as' =>'faculty.add-book-to-cart',
        'uses' => 'LibFacultyController@addBookToCart'
    ]);

    Route::any('faculty/book-transaction/',[
        'as' =>'faculty.book-transaction',
        'uses' => 'LibFacultyController@storeBookTransaction'
    ]);

    Route::any('faculty/checkout',[
        'as' =>'faculty.checkout',
        'uses' => 'LibFacultyController@checkout'
    ]);

    Route::any('faculty/my-book',[
        'as' =>'faculty.my-book',
        'uses' => 'LibFacultyController@viewMyBook'
    ]);

    Route::any('faculty/checkout-by-faculty/{all_cart_book_ids}',[
        'as' =>'faculty.checkout-by-faculty',
        'uses' => 'LibFacultyController@checkoutByFaculty'
    ]);

    Route::any('faculty/book/download/{book_id}',[
        'as' =>'faculty.book.download',
        'uses' => 'LibFacultyController@downloadBook'
    ]);

    Route::any('faculty/remove-from-cart/{id}',[
        'as' =>'faculty.remove-from-cart',
        'uses' => 'LibFacultyController@removeBookFromCart'
    ]);

    Route::any('faculty/view/book/{book_id}',[
        'as' =>'faculty.view.book',
        'uses' => 'LibFacultyController@viewBook'
    ]);

    //Library : Student

    Route::any('student/find-book',[
        'as' =>'student.find-book',
        'uses' => 'LibStudentController@findBooks'
    ]);



    Route::any('student/book/download/{book_id}',[
        'as' =>'student.book.download',
        'uses' => 'LibStudentController@getDownload'
    ]);


    Route::any('student/add-to-cart/{book_id}',[
        'as' =>'student.add-to-cart',
        'uses' => 'LibStudentController@addBookToStudentCart'
    ]);


    Route::any('student/remove-from-cart/{id}',[
        'as' =>'student.remove-from-cart',
        'uses' => 'LibStudentController@removeBookFromToCart'
    ]);

    Route::any('student/view-cart',[
        'as' =>'student.view-cart',
        'uses' => 'LibStudentController@viewCart'
    ]);

    Route::any('student/payment',[
        'as' =>'student.payment',
        'uses' => 'LibStudentController@paymentMethod'
    ]);


    Route::any('student/send-info-to-transaction',[
        'as' =>'student.send-info-to-transaction',
        'uses' => 'LibStudentController@saveInfoToTransactionTable'
    ]);



    Route::any('student/my-book',[
        'as' =>'student.my-book',
        'uses' => 'LibStudentController@myBook'
    ]);


//Route::any('faculty/book-transaction',[
//    'as' =>'faculty.book-transaction',
//    'uses' => 'LibStudentController@getBookTransaction'
//]);



});


