<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03-Aug-15
 * Time: 2:40 PM
 */

class HrBankTable extends Seeder{

    public function run(){

        DB::table('hr_bank')->delete();

        $course = array(
            'Dhaka Bank' => 'BANANI BRANCH',
            'Prime Bank'=> 'DHANMONDI BRANCH',
            'City Bank'=> 'GULSAN BRANCH',
            'Jamuna Bank'=> 'BANANI BRANCH',
            'HSBC Bank'=> 'MIRPUR BRANCH',
            'One Bank'=> 'DHANMONDI BRANCH',
            'Dutch-Bangla Bank'=> 'GULSAN BRANCH'
        );

        foreach($course as $key => $value){
            HrBank::insert(array(
                'bank_name' => $key,
                'branch' => $value,
                'address' => $key,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }

} 