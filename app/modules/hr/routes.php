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

    Route::any('hr/hr_bank/index',[
        'as' => 'hr.hr_bank.index',
        'uses'=> 'HrController@indexHrBank'
    ]);

    Route::any('hr/hr_bank/create',[
        'as' => 'hr.hr_bank.create',
        'uses'=> 'HrController@createHrBank'
    ]);

    Route::any('hr/hr_bank/store',[
        'as' => 'hr.hr_bank.store',
        'uses'=> 'HrController@storeHrBank'
    ]);

    Route::any('hr/hr_bank/show',[
        'as' => 'hr.hr_bank.show',
        'uses'=> 'HrController@showHrBank'
    ]);

    Route::any('hr/hr_bank/edit',[
        'as' => 'hr.hr_bank.edit',
        'uses'=> 'HrController@editHrBank'
    ]);

    Route::any('hr/hr_bank/update',[
        'as' => 'hr.hr_bank.update',
        'uses'=> 'HrController@updateHrBank'
    ]);

    Route::any('hr/hr_bank/delete',[
        'as' => 'hr.hr_bank.delete',
        'uses'=> 'HrController@deleteHrBank'
    ]);

    //hr_salary_grade

    Route::any('hr/hr_salary_grade/index',[
        'as' => 'hr.hr_salary_grade.index',
        'uses'=> 'HrController@indexHrBank'
    ]);

    Route::any('hr/hr_salary_grade/create',[
        'as' => 'hr.hr_salary_grade.create',
        'uses'=> 'HrController@createHrBank'
    ]);

    Route::any('hr/hr_salary_grade/store',[
        'as' => 'hr.hr_salary_grade.store',
        'uses'=> 'HrController@storeHrBank'
    ]);

    Route::any('hr/hr_salary_grade/show',[
        'as' => 'hr.hr_salary_grade.show',
        'uses'=> 'HrController@showHrBank'
    ]);

    Route::any('hr/hr_salary_grade/edit',[
        'as' => 'hr.hr_salary_grade.edit',
        'uses'=> 'HrController@editHrBank'
    ]);

    Route::any('hr/hr_salary_grade/update',[
        'as' => 'hr.hr_salary_grade.update',
        'uses'=> 'HrController@updateHrBank'
    ]);

    Route::any('hr/hr_salary_grade/delete',[
        'as' => 'hr.hr_salary_grade.delete',
        'uses'=> 'HrController@deleteHrBank'
    ]);


});
