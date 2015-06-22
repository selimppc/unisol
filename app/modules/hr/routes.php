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

    Route::any('hr/hr_bank',[
        'as' => 'hr.hr_bank',
        'uses'=> 'HrBankController@index_hr_bank'
    ]);

    Route::any('hr/hr_bank/store',[
        'as' => 'hr.hr_bank.store',
        'uses'=> 'HrBankController@store_hr_bank'
    ]);

    Route::any('hr/hr_bank/show/{id}',[
        'as' => 'hr.hr_bank.show',
        'uses'=> 'HrBankController@show_hr_bank'
    ]);

    Route::any('hr/hr_bank/edit/{id}',[
        'as' => 'hr.hr_bank.edit',
        'uses'=> 'HrBankController@edit_hr_bank'
    ]);

    Route::any('hr/hr_bank/destroy/{id}',[
        'as' => 'hr.hr_bank.destroy',
        'uses'=> 'HrBankController@delete_hr_bank'
    ]);

    Route::any('hr/hr_bank/batch_delete',[
        'as' => 'hr.hr_bank.batch_delete',
        'uses'=> 'HrBankController@batch_delete_hr_bank'
    ]);

//hr_salary_grade

    Route::any('hr/hr_salary_grade',[
        'as' => 'hr.hr_salary_grade',
        'uses'=> 'HrSalaryGradeController@index_hr_salary_grade'
    ]);

    Route::any('hr/hr_salary_grade/store',[
        'as' => 'hr.hr_salary_grade.store',
        'uses'=> 'HrSalaryGradeController@store_hr_salary_grade'
    ]);

    Route::any('hr/hr_salary_grade/show',[
        'as' => 'hr.hr_salary_grade.show',
        'uses'=> 'HrSalaryGradeController@show_hr_salary_grade'
    ]);

    Route::any('hr/hr_salary_grade/edit',[
        'as' => 'hr.hr_salary_grade.edit',
        'uses'=> 'HrSalaryGradeController@edit_hr_salary_grade'
    ]);

    Route::any('hr/hr_salary_grade/delete',[
        'as' => 'hr.hr_salary_grade.delete',
        'uses'=> 'HrSalaryGradeController@delete_hr_salary_grade'
    ]);


});
