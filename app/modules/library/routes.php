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

    Route::get('book/category',
        'LibraryController@index'
    );
    Route::post('category/save',
        'LibraryController@store'
    );

});


