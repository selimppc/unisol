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




//
//Route::any('faculty/add-book-to-cart/{book_id}',[
//    'as' =>'faculty.add-book-to-cart',
//    'uses' => 'LibStudentController@addBookToCart'
//]);
//
//Route::any('faculty/book-transaction',[
//    'as' =>'faculty.book-transaction',
//    'uses' => 'LibStudentController@getBookTransaction'
//]);
