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

    include("routes_tjt.php");

    Route::get('/', function() {
        return 'Thank you so much!';
    });

//HR BANK
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
//HR SALARY GRADE
    Route::any('salary-grade',[
        'as' => 'salary-grade',
        'uses'=> 'HrSalaryGradeController@index_hr_salary_grade'
    ]);
    Route::any('salary-grade/store',[
        'as' => 'salary-grade.store',
        'uses'=> 'HrSalaryGradeController@store_hr_salary_grade'
    ]);
    Route::any('salary-grade/show/{s_g_id}',[
        'as' => 'salary-grade.show',
        'uses'=> 'HrSalaryGradeController@show_hr_salary_grade'
    ]);
    Route::any('salary-grade/edit/{s_g_id}',[
        'as' => 'salary-grade.edit',
        'uses'=> 'HrSalaryGradeController@edit_hr_salary_grade'
    ]);
    Route::any('salary-grade/destroy/{s_g_id}',[
        'as' => 'salary-grade.destroy',
        'uses'=> 'HrSalaryGradeController@destroy_hr_salary_grade'
    ]);
    Route::any('salary-grade/batch_delete',[
        'as' => 'salary-grade.batch_delete',
        'uses'=> 'HrSalaryGradeController@batch_delete_hr_salary_grade'
    ]);
//HR TAX RULE
    Route::any('tax-rule',[
        'as' => 'tax-rule',
        'uses'=> 'HrTaxRuleController@index_hr_tax_rule'
    ]);
    Route::any('tax-rule/store',[
        'as' => 'tax-rule.store',
        'uses'=> 'HrTaxRuleController@store_hr_tax_rule'
    ]);
    Route::any('tax-rule/show/{t_r_id}',[
        'as' => 'tax-rule.show',
        'uses'=> 'HrTaxRuleController@show_hr_tax_rule'
    ]);
    Route::any('tax-rule/edit/{t_r_id}',[
        'as' => 'tax-rule.edit',
        'uses'=> 'HrTaxRuleController@edit_hr_tax_rule'
    ]);
    Route::any('tax-rule/destroy/{t_r_id}',[
        'as' => 'tax-rule.destroy',
        'uses'=> 'HrTaxRuleController@destroy_hr_tax_rule'
    ]);
    Route::any('tax-rule/batch_delete',[
        'as' => 'tax-rule.batch_delete',
        'uses'=> 'HrTaxRuleController@batch_delete_hr_tax_rule'
    ]);
//CURRENCY
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
//HR EMPLOYEE
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
//HR ALLOWANCE
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
//HR SALARY
    Route::any('salary',[
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
    Route::any('salary-batch-delete',[
        'as' => 'salary-batch-delete',
        'uses'=> 'HrSalaryController@batch_delete_hr_salary'
    ]);
//HR BONUS
    Route::any('bonus',[
        'as' => 'bonus',
        'uses'=> 'HrBonusController@index_hr_bonus'
    ]);
    Route::any('store-bonus',[
        'as' => 'store-bonus',
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
    Route::any('bonus-batch-delete',[
        'as' => 'bonus-batch-delete',
        'uses'=> 'HrBonusController@batch_delete_hr_bonus'
    ]);
//HR LOAN HEAD
    Route::any('loan-head',[
        'as' => 'loan-head',
        'uses'=> 'HrLoanHeadController@index_hr_loan_head'
    ]);
    Route::any('save-loan-head',[
        'as' => 'save-loan-head',
        'uses'=> 'HrLoanHeadController@store_hr_loan_head'
    ]);
    Route::any('loan-head/show/{lh_id}',[
        'as' => 'loan-head.show',
        'uses'=> 'HrLoanHeadController@show_hr_loan_head'
    ]);
    Route::any('loan-head/edit/{lh_id}',[
        'as' => 'loan-head.edit',
        'uses'=> 'HrLoanHeadController@edit_hr_loan_head'
    ]);
    Route::any('loan-head/destroy/{lh_id}',[
        'as' => 'loan-head.destroy',
        'uses'=> 'HrLoanHeadController@destroy_hr_loan_head'
    ]);
    Route::any('batch-delete-loan-head',[
        'as' => 'batch-delete-loan-head',
        'uses'=> 'HrLoanHeadController@batch_delete_hr_loan_head'
    ]);
//HR OVER TIME
    Route::any('over-time',[
        'as' => 'over-time',
        'uses'=> 'HrOverTimeController@index_hr_over_time'
    ]);
    Route::any('save-over-time',[
        'as' => 'save-over-time',
        'uses'=> 'HrOverTimeController@store_hr_over_time'
    ]);
    Route::any('over-time/show/{lh_id}',[
        'as' => 'over-time.show',
        'uses'=> 'HrOverTimeController@show_hr_over_time'
    ]);
    Route::any('over-time/edit/{lh_id}',[
        'as' => 'over-time.edit',
        'uses'=> 'HrOverTimeController@edit_hr_over_time'
    ]);
    Route::any('over-time/destroy/{lh_id}',[
        'as' => 'over-time.destroy',
        'uses'=> 'HrOverTimeController@destroy_hr_over_time'
    ]);
    Route::any('over-time-batch-delete',[
        'as' => 'over-time-batch-delete',
        'uses'=> 'HrOverTimeController@batch_delete_hr_over_time'
    ]);
//HR LOAN DETAIL
    Route::any('loan-detail/{loan_head_id}',[
        'as' => 'loan-detail',
        'uses'=> 'HrLoanDetailController@index_hr_loan_detail'
    ]);
    Route::any('save-loan-detail',[
        'as' => 'save-loan-detail',
        'uses'=> 'HrLoanDetailController@store_hr_loan_detail'
    ]);
    Route::any('ajax-delete-hr-loan-detail', [
        'as'   => 'ajax-delete-hr-loan-detail',
        'uses' => 'HrLoanDetailController@ajax_delete_hr_loan_detail'
    ]);
    Route::any('loan-detail/show/{ld_id}',[
        'as' => 'loan-detail.show',
        'uses'=> 'HrLoanDetailController@show_hr_loan_detail'
    ]);
    Route::any('loan-detail/edit/{ld_id}',[
        'as' => 'loan-detail.edit',
        'uses'=> 'HrLoanDetailController@edit_hr_loan_detail'
    ]);
    Route::any('loan-detail/destroy/{ld_id}',[
        'as' => 'loan-detail.destroy',
        'uses'=> 'HrLoanDetailController@destroy_hr_loan_detail'
    ]);
    Route::any('batch-delete-loan-detail',[
        'as' => 'batch-delete-loan-detail',
        'uses'=> 'HrLoanDetailController@batch_delete_hr_loan_detail'
    ]);
//HR SALARY ADVANCE
    Route::any('salary-advance',[
        'as' => 'salary-advance',
        'uses'=> 'HrSalaryAdvanceController@index_hr_salary_advance'
    ]);
    Route::any('store-salary-advance',[
        'as' => 'store-salary-advance',
        'uses'=> 'HrSalaryAdvanceController@store_hr_salary_advance'
    ]);
    Route::any('salary-advance/show/{s_a_id}',[
        'as' => 'salary-advance.show',
        'uses'=> 'HrSalaryAdvanceController@show_hr_salary_advance'
    ]);
    Route::any('salary-advance/edit/{s_a_id}',[
        'as' => 'salary-advance.edit',
        'uses'=> 'HrSalaryAdvanceController@edit_hr_salary_advance'
    ]);
    Route::any('salary-advance/destroy/{s_a_id}',[
        'as' => 'salary-advance.destroy',
        'uses'=> 'HrSalaryAdvanceController@destroy_hr_salary_advance'
    ]);
    Route::any('salary-advance-batch-delete',[
        'as' => 'salary-advance-batch-delete',
        'uses'=> 'HrSalaryAdvanceController@batch_delete_hr_salary_advance'
    ]);
//HR SALARY TRANSACTION
    Route::any('salary-transaction',[
        'as' => 'salary-transaction',
        'uses'=> 'HrSalaryTransactionHeadController@index_hr_salary_transaction'
    ]);
    Route::any('store-salary-transaction',[
        'as' => 'store-salary-transaction',
        'uses'=> 'HrSalaryTransactionHeadController@store_hr_salary_transaction'
    ]);
    Route::any('salary-transaction/show/{s_t_id}',[
        'as' => 'salary-transaction.show',
        'uses'=> 'HrSalaryTransactionHeadController@show_hr_salary_transaction'
    ]);
    Route::any('salary-transaction/edit/{s_t_id}',[
        'as' => 'salary-transaction.edit',
        'uses'=> 'HrSalaryTransactionHeadController@edit_hr_salary_transaction'
    ]);
    Route::any('salary-transaction/destroy/{s_t_id}',[
        'as' => 'salary-transaction.destroy',
        'uses'=> 'HrSalaryTransactionHeadController@destroy_hr_salary_transaction'
    ]);
    Route::any('salary-transaction-batch-delete',[
        'as' => 'salary-transaction-batch-delete',
        'uses'=> 'HrSalaryTransactionHeadController@batch_delete_hr_salary_transaction'
    ]);

    Route::any('confirm-salary-transaction/{st_id}',[
        'as' => 'confirm-salary-transaction',
        'uses'=> 'HrSalaryTransactionHeadController@confirm_salary_transaction'
    ]);

    Route::any('salary-transaction/show-confirm/{s_t_id}',[
        'as' => 'salary-transaction.show-confirm',
        'uses'=> 'HrSalaryTransactionHeadController@show_confirm_salary_transaction'
    ]);






//HR SALARY ALLOWANCE
    Route::any('salary-allowance/{s_id}',[
        'as' => 'salary-allowance',
        'uses'=> 'HrSalaryAllowanceController@index_hr_salary_allowance'
    ]);
    Route::any('store-salary-allowance',[
        'as' => 'store-salary-allowance',
        'uses'=> 'HrSalaryAllowanceController@store_hr_salary_allowance'
    ]);
    Route::any('hr-salary-allowace-ajax-delete', [
        'as'   => 'hr-salary-allowace-ajax-delete',
        'uses' => 'HrSalaryAllowanceController@ajax_delete_hr_salary_allowance'
    ]);
    Route::any('salary-allowance/show/{s_a_id}',[
        'as' => 'salary-allowance.show',
        'uses'=> 'HrSalaryAllowanceController@show_hr_salary_allowance'
    ]);
    Route::any('salary-allowance/edit/{s_a_id}',[
        'as' => 'salary-allowance.edit',
        'uses'=> 'HrSalaryAllowanceController@edit_hr_salary_allowance'
    ]);
    Route::any('salary-allowance/destroy/{s_a_id}',[
        'as' => 'salary-allowance.destroy',
        'uses'=> 'HrSalaryAllowanceController@destroy_hr_salary_allowance'
    ]);
    Route::any('salary-allowance-batch-delete',[
        'as' => 'salary-allowance-batch-delete',
        'uses'=> 'HrSalaryAllowanceController@batch_delete_hr_salary_allowance'
    ]);
//HR SALARY DEDUCTION
    Route::any('salary-deduction/{loan_head_id}/{employee_id}',[
        'as' => 'salary-deduction',
        'uses'=> 'HrSalaryDeductionController@index_hr_salary_deduction'
    ]);
    Route::any('store-salary-deduction',[
        'as' => 'store-salary-deduction',
        'uses'=> 'HrSalaryDeductionController@store_hr_salary_deduction'
    ]);
    Route::any('hr-salary-deduction-ajax-delete', [
        'as'   => 'hr-salary-deduction-ajax-delete',
        'uses' => 'HrSalaryDeductionController@ajax_delete_hr_salary_deduction'
    ]);
    Route::any('show-salary-deduction/{s_d_id}',[
        'as' => 'show-salary-deduction',
        'uses'=> 'HrSalaryDeductionController@show_hr_salary_deduction'
    ]);
    Route::any('edit-salary-deduction/{s_d_id}',[
        'as' => 'edit-salary-deduction',
        'uses'=> 'HrSalaryDeductionController@edit_hr_salary_deduction'
    ]);
    Route::any('destroy-salary-deduction/{s_d_id}',[
        'as' => 'destroy-salary-deduction',
        'uses'=> 'HrSalaryDeductionController@destroy_hr_salary_deduction'
    ]);
    Route::any('salary-deduction/batch_delete',[
        'as' => 'salary-deduction.batch_delete',
        'uses'=> 'HrSalaryDeductionController@batch_delete_hr_salary_deduction'
    ]);
//HR SALARY TRANSACTION DETAIL
    Route::any('salary-transaction-detail/{s_t_id}',[
        'as' => 'salary-transaction-detail',
        'uses'=> 'HrSalaryTransactionDetailController@index_hr_salary_transaction_detail'
    ]);
    Route::any('store-salary-transaction-detail',[
        'as' => 'store-salary-transaction-detail',
        'uses'=> 'HrSalaryTransactionDetailController@store_hr_salary_transaction_detail'
    ]);
    Route::any('ajax-delete-salary-trn-dtl', [
        'as'   => 'ajax-delete-salary-trn-dtl',
        'uses' => 'HrSalaryTransactionDetailController@ajax_delete_salary_trn_dtl'
    ]);
    Route::any('show-salary-transaction-detail/{s_t_d_id}',[
        'as' => 'show-salary-transaction-detail',
        'uses'=> 'HrSalaryTransactionDetailController@show_hr_salary_transaction_detail'
    ]);
    Route::any('edit-salary-transaction-detail/{s_t_d_id}',[
        'as' => 'edit-salary-transaction-detail',
        'uses'=> 'HrSalaryTransactionDetailController@edit_hr_salary_transaction_detail'
    ]);
    Route::any('destroy-salary-transaction-detail/{s_t_d_id}',[
        'as' => 'destroy-salary-transaction-detail',
        'uses'=> 'HrSalaryTransactionDetailController@destroy_hr_salary_transaction_detail'
    ]);
    Route::any('salary-transaction-detail-batch-delete',[
        'as' => 'salary-transaction-detail-batch-delete',
        'uses'=> 'HrSalaryTransactionDetailController@batch_delete_hr_salary_transaction_detail'
    ]);
// Dependable Drop Down
    Route::any('sal-allowance/amount',[
        'as'   => 'sal-allowance.amount',
        'uses' => 'HrSalaryTransactionDetailController@hr_salary_allowance_amount'
    ]);
    Route::any('sal-deduction/amount',[
        'as'   => 'sal-deduction.amount',
        'uses' => 'HrSalaryTransactionDetailController@hr_salary_deduction_amount'
    ]);
    Route::any('sal-overtime/amount',[
        'as'   => 'sal-overtime.amount',
        'uses' => 'HrSalaryTransactionDetailController@hr_overtime_amount'
    ]);
    Route::any('sal-bonus/amount',[
        'as'   => 'sal-bonus.amount',
        'uses' => 'HrSalaryTransactionDetailController@hr_salary_bonus_amount'
    ]);
});
