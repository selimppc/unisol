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

Route::any('faculty/view-cart',[
    'as' =>'faculty.view-cart',
    'uses' => 'LibFacultyController@viewBookToCart'
]);

Route::any('faculty/checkout-by-faculty/{all_cart_book_ids}',[
    'as' =>'faculty.checkout-by-faculty',
    'uses' => 'LibFacultyController@checkoutByFaculty'
]);

Route::any('faculty/book/download/{book_id}',[
    'as' =>'student.book.download',
    'uses' => 'LibFacultyController@getBookDownload'
]);

Route::any('faculty/remove-from-cart/{id}',[
    'as' =>'faculty.remove-from-cart',
    'uses' => 'LibFacultyController@removeBookFromCart'
]);

