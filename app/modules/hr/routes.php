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

    Route::any('salary_grade/destroy/{s_g_id}',[
        'as' => 'salary_grade.destroy',
        'uses'=> 'HrSalaryGradeController@destroy_hr_salary_grade'
    ]);

    Route::any('salary_grade/batch_delete',[
        'as' => 'salary_grade.batch_delete',
        'uses'=> 'HrSalaryGradeController@batch_delete_hr_salary_grade'
    ]);

//hr_tax_rule

    Route::any('tax_rule',[
        'as' => 'tax_rule',
        'uses'=> 'HrTaxRuleController@index_hr_tax_rule'
    ]);

    Route::any('tax_rule/store',[
        'as' => 'tax_rule.store',
        'uses'=> 'HrTaxRuleController@store_hr_tax_rule'
    ]);

    Route::any('tax_rule/show/{t_r_id}',[
        'as' => 'tax_rule.show',
        'uses'=> 'HrTaxRuleController@show_hr_tax_rule'
    ]);

    Route::any('tax_rule/edit/{t_r_id}',[
        'as' => 'tax_rule.edit',
        'uses'=> 'HrTaxRuleController@edit_hr_tax_rule'
    ]);

    Route::any('tax_rule/destroy/{t_r_id}',[
        'as' => 'tax_rule.destroy',
        'uses'=> 'HrTaxRuleController@destroy_hr_tax_rule'
    ]);

    Route::any('tax_rule/batch_delete',[
        'as' => 'tax_rule.batch_delete',
        'uses'=> 'HrTaxRuleController@batch_delete_hr_tax_rule'
    ]);

    //Currency
    Route::any('currency',[
        'as' => 'currency',
        'uses'=> 'CurrencyController@index_currency'
    ]);

    Route::any('currency/store',[
        'as' => 'currency.store',
        'uses'=> 'CurrencyController@store_currency'
    ]);

    Route::any('currency/show/{c_id}',[
        'as' => 'currency.show',
        'uses'=> 'CurrencyController@show_currency'
    ]);

    Route::any('currency/edit/{c_id}',[
        'as' => 'currency.edit',
        'uses'=> 'CurrencyController@edit_currency'
    ]);

    Route::any('currency/destroy/{c_id}',[
        'as' => 'currency.destroy',
        'uses'=> 'CurrencyController@destroy_currency'
    ]);

    Route::any('currency/batch_delete',[
        'as' => 'currency.batch_delete',
        'uses'=> 'CurrencyController@batch_delete_currency'
    ]);

//hr_employee

    Route::any('employee',[
        'as' => 'employee',
        'uses'=> 'HrEmployeeController@index_hr_employee'
    ]);

    Route::any('employee/store',[
        'as' => 'employee.store',
        'uses'=> 'HrEmployeeController@store_hr_employee'
    ]);

    Route::any('employee/show/{emp_id}',[
        'as' => 'employee.show',
        'uses'=> 'HrEmployeeController@show_hr_employee'
    ]);

    Route::any('employee/edit/{emp_id}',[
        'as' => 'employee.edit',
        'uses'=> 'HrEmployeeController@edit_hr_employee'
    ]);

    Route::any('employee/destroy/{emp_id}',[
        'as' => 'employee.destroy',
        'uses'=> 'HrEmployeeController@destroy_hr_employee'
    ]);

    Route::any('employee/batch_delete',[
        'as' => 'employee.batch_delete',
        'uses'=> 'HrEmployeeController@batch_delete_hr_employee'
    ]);

    //hr_allowance

    Route::any('allowance',[
        'as' => 'allowance',
        'uses'=> 'HrAllowanceController@index_hr_allowance'
    ]);

    Route::any('allowance/store',[
        'as' => 'allowance.store',
        'uses'=> 'HrAllowanceController@store_hr_allowance'
    ]);

    Route::any('allowance/show/{a_id}',[
        'as' => 'allowance.show',
        'uses'=> 'HrAllowanceController@show_hr_allowance'
    ]);

    Route::any('allowance/edit/{a_id}',[
        'as' => 'allowance.edit',
        'uses'=> 'HrAllowanceController@edit_hr_allowance'
    ]);

    Route::any('allowance/destroy/{a_id}',[
        'as' => 'allowance.destroy',
        'uses'=> 'HrAllowanceController@destroy_hr_allowance'
    ]);

    Route::any('allowance/batch_delete',[
        'as' => 'allowance.batch_delete',
        'uses'=> 'HrAllowanceController@batch_delete_hr_allowance'
    ]);

    //hr_salary

    Route::any('salary/{emp_id}',[
        'as' => 'salary',
        'uses'=> 'HrSalaryController@index_hr_salary'
    ]);

    Route::any('store-salary',[
        'as' => 'store-salary',
        'uses'=> 'HrSalaryController@store_hr_salary'
    ]);

    Route::any('salary/show/{s_id}',[
        'as' => 'salary.show',
        'uses'=> 'HrSalaryController@show_hr_salary'
    ]);

    Route::any('salary/edit/{s_id}',[
        'as' => 'salary.edit',
        'uses'=> 'HrSalaryController@edit_hr_salary'
    ]);

    Route::any('salary/destroy/{s_id}',[
        'as' => 'salary.destroy',
        'uses'=> 'HrSalaryController@destroy_hr_salary'
    ]);

    Route::any('salary/batch_delete',[
        'as' => 'salary.batch_delete',
        'uses'=> 'HrSalaryController@batch_delete_hr_salary'
    ]);

    //------->
    //hr_bonus

    Route::any('bonus/{}',[
        'as' => 'bonus',
        'uses'=> 'HrBonusController@index_hr_bonus'
    ]);

    Route::any('bonus/store',[
        'as' => 'bonus.store',
        'uses'=> 'HrBonusController@store_hr_bonus'
    ]);

    Route::any('bonus/show/{bn_id}',[
        'as' => 'bonus.show',
        'uses'=> 'HrBonusController@show_hr_bonus'
    ]);

    Route::any('bonus/edit/{bn_id}',[
        'as' => 'bonus.edit',
        'uses'=> 'HrBonusController@edit_hr_bonus'
    ]);

    Route::any('bonus/destroy/{bn_id}',[
        'as' => 'bonus.destroy',
        'uses'=> 'HrBonusController@destroy_hr_bonus'
    ]);

    Route::any('bonus/batch_delete',[
        'as' => 'bonus.batch_delete',
        'uses'=> 'HrBonusController@batch_delete_hr_bonus'
    ]);



    //hr_loan_head
    Route::any('loan_head/{emp_id}',[
        'as' => 'loan_head',
        'uses'=> 'HrLoanHeadController@index_hr_loan_head'
    ]);

    //hr_loan_detail
    Route::any('loan_detail/{}',[
        'as' => 'loan_detail',
        'uses'=> 'HrLoanDetailController@index_hr_loan_detail'
    ]);

    //hr_over_time
    Route::any('over_time/{}',[
        'as' => 'over_time',
        'uses'=> 'HrOverTimeController@index_hr_over_time'
    ]);

    //hr_salary_advance
    Route::any('salary_advance/{}',[
        'as' => 'salary_advance',
        'uses'=> 'HrSalaryAdvanceController@index_hr_salary_advance'
    ]);

    //hr_salary_allowance
    Route::any('salary_allowance/{}',[
        'as' => 'salary_allowance',
        'uses'=> 'HrSalaryAllowanceController@index_hr_salary_allowance'
    ]);

    //hr_salary_deduction
    Route::any('salary_deduction/{}',[
        'as' => 'salary_deduction',
        'uses'=> 'HrSalaryDeductionController@index_hr_salary_deduction'
    ]);

    //hr_salary_transaction
    Route::any('salary_transaction/{}',[
        'as' => 'salary_transaction',
        'uses'=> 'HrSalaryTransactionController@index_hr_salary_transaction'
    ]);

    //hr_salary_transaction_detail
    Route::any('salary_transaction_detail/{emp_id}',[
        'as' => 'salary_transaction_detail',
        'uses'=> 'HrSalaryTransactionDetailController@index_hr_salary_transaction_detail'
    ]);

});
