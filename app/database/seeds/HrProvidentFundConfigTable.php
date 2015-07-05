<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05-Jul-15
 * Time: 1:01 PM
 */

class HrProvidentFundConfigTable extends Seeder{

    public function run(){

        DB::table('hr_provident_fund_config')->delete();

        HrProvidentFundConfig::insert(array(
            'employee_type' => 'permanent',
            'contribution_amount' => '500000',
            'company_contribution_0' => '36',
            'company_contribution_25' => '60',
            'company_contribution_50' => '120',
            'company_contribution_75' => '180',
            'company_contribution_100' => '240',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
} 