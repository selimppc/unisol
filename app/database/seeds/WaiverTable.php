<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/9/2015
 * Time: 1:46 PM
 */

class WaiverTable extends Seeder{
    public function run(){

        DB::table('waiver')->delete();

        Waiver::insert(array(
            'title' => '25 % Waiver',
            'description' => 'Waiver on admission',
            'waiver_type' => 'one-time',
            'is_percentage' => '1',
            'amount' => '5000',
            'billing_item_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Waiver::insert(array(
            'title' => '50 % Waiver',
            'description' => 'Waiver on admission',
            'waiver_type' => 'one-time',
            'is_percentage' => '1',
            'amount' => '10000',
            'acm_billing_item_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Waiver::insert(array(
            'title' => '75 % Waiver',
            'description' => 'Waiver on admission',
            'waiver_type' => 'one-time',
            'is_percentage' => '1',
            'amount' => '15000',
            'billing_item_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Waiver::insert(array(
            'title' => '100 % Waiver',
            'description' => 'Waiver on admission',
            'waiver_type' => 'one-time',
            'is_percentage' => '1',
            'amount' => '20000',
            'billing_item_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

    }
} 