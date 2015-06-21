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

Route::group(['prefix' => 'hr'], function() {


//    include("routes_sh_fac.php");

    Route::get('/', function() {
        return 'Thank you so much!';
    });

    //hr_bank

    Route::any('human_resource/hr_bank/index',[
        'as' => 'human_resource.hr_bank.index',
        'uses'=> 'HrController@indexHrBank'
    ]);

    Route::any('human_resource/hr_bank/create',[
        'as' => 'human_resource.hr_bank.create',
        'uses'=> 'HrController@createHrBank'
    ]);

    Route::any('human_resource/hr_bank/store',[
        'as' => 'human_resource.hr_bank.store',
        'uses'=> 'HrController@storeHrBank'
    ]);

    Route::any('human_resource/hr_bank/show',[
        'as' => 'human_resource.hr_bank.show',
        'uses'=> 'HrController@showHrBank'
    ]);

    Route::any('human_resource/hr_bank/edit',[
        'as' => 'human_resource.hr_bank.edit',
        'uses'=> 'HrController@editHrBank'
    ]);

    Route::any('human_resource/hr_bank/update',[
        'as' => 'human_resource.hr_bank.update',
        'uses'=> 'HrController@updateHrBank'
    ]);

    Route::any('human_resource/hr_bank/delete',[
        'as' => 'human_resource.hr_bank.delete',
        'uses'=> 'HrController@deleteHrBank'
    ]);

    //hr_salary_grade

    Route::any('human_resource/hr_salary_grade/index',[
        'as' => 'human_resource.hr_salary_grade.index',
        'uses'=> 'HrController@indexHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/create',[
        'as' => 'human_resource.hr_salary_grade.create',
        'uses'=> 'HrController@createHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/store',[
        'as' => 'human_resource.hr_salary_grade.store',
        'uses'=> 'HrController@storeHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/show',[
        'as' => 'human_resource.hr_salary_grade.show',
        'uses'=> 'HrController@showHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/edit',[
        'as' => 'human_resource.hr_salary_grade.edit',
        'uses'=> 'HrController@editHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/update',[
        'as' => 'human_resource.hr_salary_grade.update',
        'uses'=> 'HrController@updateHrBank'
    ]);

    Route::any('human_resource/hr_salary_grade/delete',[
        'as' => 'human_resource.hr_salary_grade.delete',
        'uses'=> 'HrController@deleteHrBank'
    ]);


});
