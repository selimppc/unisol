<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class BillingItemTable extends Seeder {

    public function run(){

        DB::table('billing_item')->delete();

        $items = array(
            'Application form' => 'Admission Application form charge.',
            'Admission charge' => 'Admission time charge.',
            'Enrolment Charge' => 'Term /Semester time course enrollment time charge.',
            'Credit Cost' => 'Course wise credit charge.',
            'Tution Fee' => 'Monthly tution Fee.',
            'Lab Charge' => 'Lab charge as per different Dept. wise lab.',
            'Mid Term Exam charge' => 'Charge of Mid term exam.',
            'Final term Exam Charge' => 'Charge of term final exam.',
            'Late Fee' => 'Late fee of any item.',
        );

        foreach($items as $key => $val) {
            BillingItem::insert(array(
                'title' => $val,
                'description' => $key,
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 