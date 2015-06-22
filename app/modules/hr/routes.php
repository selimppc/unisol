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

    Route::any('bank',[
        'as' => 'bank',
        'uses'=> 'HrBankController@index_hr_bank'
    ]);

    Route::any('bank/store',[
        'as' => 'bank.store',
        'uses'=> 'HrBankController@store_hr_bank'
    ]);

    Route::any('bank/show/{b_id}',[
        'as' => 'bank.show',
        'uses'=> 'HrBankController@show_hr_bank'
    ]);

    Route::any('bank/edit/{b_id}',[
        'as' => 'bank.edit',
        'uses'=> 'HrBankController@edit_hr_bank'
    ]);

    Route::any('bank/destroy/{b_id}',[
        'as' => 'bank.destroy',
        'uses'=> 'HrBankController@destroy_hr_bank'
    ]);

    Route::any('bank/batch_delete',[
        'as' => 'bank.batch_delete',
        'uses'=> 'HrBankController@batch_delete_hr_bank'
    ]);

//hr_salary_grade

    Route::any('salary_grade',[
        'as' => 'salary_grade',
        'uses'=> 'HrSalaryGradeController@index_hr_salary_grade'
    ]);

    Route::any('salary_grade/store',[
        'as' => 'salary_grade.store',
        'uses'=> 'HrSalaryGradeController@store_hr_salary_grade'
    ]);

    Route::any('salary_grade/show/{s_g_id}',[
        'as' => 'salary_grade.show',
        'uses'=> 'HrSalaryGradeController@show_hr_salary_grade'
    ]);

    Route::any('salary_grade/edit/{s_g_id}',[
        'as' => 'salary_grade.edit',
        'uses'=> 'HrSalaryGradeController@edit_hr_salary_grade'
    ]);

    Route::any('salary_grade/delete/{s_g_id}',[
        'as' => 'salary_grade.delete',
        'uses'=> 'HrSalaryGradeController@destroy_hr_salary_grade'
    ]);

    Route::any('salary_grade/batch_delete',[
        'as' => 'salary_grade.batch_delete',
        'uses'=> 'HrSalaryGradeController@batch_delete_hr_salary_grade'
    ]);


});
