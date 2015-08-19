<?php

class HrAllowanceTable extends Seeder {

    public function run(){

        DB::table('hr_allowance')->delete();

        $course = array(
            'Home Rent Allowance' => 'HOUSE-RENT',
            'Medical Allowance'=> 'MEDIC',
            'Conveyance Allowance'=> 'CONVEY',
            'Transport Allowance'=> 'TRANSPORT',
            'Foreign Allowance'=> 'FOREIGN',
            'Lunch Allowance'=> 'LUNCH',
            'Over Time Allowance'=> 'OVER-TIME'
        );

        foreach($course as $key => $value){
            HrAllowance::insert(array(
                'title' => $key,
                'code' => $value,
                'description' => $key,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}