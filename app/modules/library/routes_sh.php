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
