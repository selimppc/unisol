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

//Route::get('/','HomeController@index');




<<<<<<< HEAD
Route::get('degree_level/','DegreeLevelController@index');

Route::any('degree_level/create','DegreeLevelController@create');

Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);

Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);


Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);
Route::any('degree_level/update/{id}', ['as' => 'degreelevel.update','uses' => 'DegreeLevelController@update' ]);


Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);
=======
/*
==================================================================
Selim
==================================================================
*/
>>>>>>> 90702d2b53891d8d45a4910e39fee79df36b4bbc

include("routes_sr.php");


/*
==================================================================
Shafi
==================================================================
*/

include("routes_sh.php");


/*
==================================================================
Ratna
==================================================================
*/

include("routes_ra.php");


/*
==================================================================
Tanin
==================================================================
*/

include("routes_tj.php");

<<<<<<< HEAD

<<<<<<< HEAD
//{------------------ End Department Routes --------------------}
=======


>>>>>>> 90702d2b53891d8d45a4910e39fee79df36b4bbc
=======
>>>>>>> 98cd5a107b165cb272f1e29a96348304c42d8add
