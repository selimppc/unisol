<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class BillingScheduleTable extends Seeder {

    public function run(){

        DB::table('billing_schedule')->delete();

        $items = array(
            'Admission' => 'ADMN',
            'Course Enrollment' => 'CSEN',
            'Mid Term' => 'MIDT',
            'Term Final' => 'TFIN',
            'Monthly Tution Fee' => 'MTFE',
        );

        foreach($items as $key => $val) {
            BillingSchedule::insert(array(
                'title' => $key,
                'code' => $val,
                'description' => $key,
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 