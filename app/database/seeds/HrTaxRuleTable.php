<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03-Aug-15
 * Time: 4:59 PM
 */

class HrTaxRuleTable extends Seeder{

    public function run(){

        DB::table('hr_tax_rule')->delete();

        $items = array(
            array(18000, 25000, 10, 'male','Bangladeshi',60000, 7,7),
            array(25000, 30000, 15, 'male','Bangladeshi',80000, 7,7),
            array(30000, 35000, 20, 'female','Bangladeshi',100000, 7,7),
            array(35000, 40000, 25, 'male','Bangladeshi',120000, 7,7),
            array(40000, 45000, 30, 'female','Bangladeshi',140000, 7,7),
        );
        foreach($items as $item) {
            HrTaxRule::create(array(
                'salary_from' => $item[0],
                'salary_to' => $item[1],
                'tax' => $item[2],
                'gender' => $item[3],
                'nationality' => $item[4],
                'additional_tax_amount' => $item[5],
                'created_by' => $item[6],
                'updated_by' => $item[7],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }

} 