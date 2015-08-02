<?php

class HrAllowanceTable extends Seeder {

    public function run(){

        DB::table('hr_allowance')->delete();

        $course = array(
            'Home Rent Allowance' => 'home-rent-allowance',
            'Medical Allowance'=> 'medical-allowance',
            'Conveyance or Transport Allowance'=> 'conveyance-transport-allowance',
            'Foreign Allowance'=> 'foreign-allowance',
            'Lunch Allowance'=> 'lunch-allowance',
            'Over Time Allowance'=> 'over-time-allowance'
        );

        foreach($course as $key => $value){
            Course::insert(array(
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