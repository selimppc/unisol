<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class ApplicantsSeeder extends Seeder{

    public function run(){

        DB::table('applicant')->delete();

        $applicant = array('applicant1' => 'applicant1@etsb.com',
            'applicant2' => 'applicant2@etsb.com',
            'applicant3' => 'applicant3@etsb.com'
            );

        foreach($applicant as $key => $val){
            Applicant::insert(array(
                'username' => $key,
                'password' => Hash::make($key),
                'email' => $val,
                'first_name' => $key,
                'last_name' => $key,
                'reg_date' => new DateTime,
                'last_visit' => new DateTime,
                'ip_address' => '192.168.1.1',
                'status' => '1',
                'verified_code' => '9875656457890867869778',
                'csrf_token' => 'fioyugpuiesiorgjhprauehrigpi',
                'applicant_id' => '1',
                'waiver_id' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }

    }
} 