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
//Library : Faculty

Route::any('student/find-book',[
    'as' =>'student.find-book',
    'uses' => 'LibStudentController@findBooks'
]);



Route::any('student/book/download/{book_id}',[
    'as' =>'student.book.download',
    'uses' => 'LibStudentController@getDownload'
]);


Route::any('student/add-book-to-cart/{book_id}',[
    'as' =>'student.add-book-to-cart',
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


Route::any('student/send-info-to-transaction/{all_cart_book_ids}',[
    'as' =>'student.send-info-to-transaction',
    'uses' => 'LibStudentController@sendInfoToTransactionTable'
]);



Route::any('student/my-cart',[
    'as' =>'student.my-cart',
    'uses' => 'LibStudentController@myCart'
]);


//Route::any('faculty/book-transaction',[
//    'as' =>'faculty.book-transaction',
//    'uses' => 'LibStudentController@getBookTransaction'
//]);
