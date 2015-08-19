<?php
/**
 * Created by PhpStorm.
 * User: Ratna
 * Date: 7/8/2015
 * Time: 1:01 PM
 */

class PaymentOptionTable extends Seeder {

    public function run(){

        DB::table('payment_option')->delete();
        PaymentOption::create(array(
            'code' => 'BANK',
            'title' => 'bank',
            'bank_branch' => 'Null',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        PaymentOption::create(array(
            'code' => 'CC',
            'title' => 'Credit Card',
            'bank_branch' => 'Null',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        PaymentOption::create(array(
            'code' => 'BKASH',
            'title' => 'Bkash Payment',
            'bank_branch' => 'Null',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        PaymentOption::create(array(
            'code' => 'DBBLM',
            'title' => 'DBBL Mobile Banking',
            'bank_branch' => 'Null',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        PaymentOption::create(array(
            'code' => 'PAYPAL',
            'title' => 'Paypal Method',
            'bank_branch' => 'Null',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));


    }
}