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

        $items = array(
            array('Dhaka Bank', 'BANANI BRANCH', '73 B Kemal Ataturk Avenue Banani, Dhaka', 7,7),
            array('Prime Bank', 'DHANMONDI BRANCH', '73 B Kemal Ataturk Avenue Dhanmandi, Dhaka', 7,7),
            array('City Bank', 'GULSAN BRANCH', '73 B Kemal Ataturk Avenue Gulsan Dhaka', 7,7),
            array('Jamuna Bank', 'BANANI BRANCH', '73 B Kemal Ataturk Avenue Banani, Dhaka',7,7),
            array('HSBC Bank', 'MIRPUR BRANCH', '73 B Kemal Ataturk Avenue Mirpur Dhaka',7,7),
            array('Dutch-Bangla Bank', 'DHANMONDI BRANCH', '73 B Kemal Ataturk Avenue Dhanmandi Dhaka',7,7),
            array('One Bank', 'GULSAN BRANCH', '73 B Kemal Ataturk Avenue Gulsan Dhaka',7,7),
        );

        foreach($items as $item) {
            HrBank::create(array(
                'bank_name' => $item[0],
                'branch' => $item[1],
                'address' => $item[2],
                'created_by' => $item[3],
                'updated_by' => $item[4],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }

} 