<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class UserTable extends Seeder {

    public function run(){

        DB::table('user')->delete();
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'admin@admin.com',
            'role_id' => 21,
            'department_id' => 21,
            //'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
            'ip_address' => '192.168.1.1',
            //'status' => '1',
            'verified_code' => '9875656457890867869778',
            'csrf_token' => 'fioyugpuiesiorgjhprauehrigpi',
            //'applicant_id' => '1',
            //'waiver_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        User::create(array(
            'username' => 'faculty',
            'password' => Hash::make('faculty'),
            'email' => 'faculty@faculty.com',
            'role_id' => 22,
            'department_id' => 19,
            //'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
            'ip_address' => '192.168.1.1',
            //'status' => '1',
            'verified_code' => '9875656457890867869778',
            'csrf_token' => 'fioyugpuiesiorgjhprauehrigpi',
            //'applicant_id' => '1',
            //'waiver_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        User::create(array(
            'username' => 'amw',
            'password' => Hash::make('amw'),
            'email' => 'amw@amw.com',
            'role_id' => 23,
            'department_id' => 20,
            //'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
            'ip_address' => '192.168.1.1',
            //'status' => '1',
            'verified_code' => '9875656457890867869778',
            'csrf_token' => 'fioyugpuiesiorgjhprauehrigpi',
            //'applicant_id' => '1',
            //'waiver_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        User::create(array(
            'username' => 'student',
            'password' => Hash::make('student'),
            'email' => 'student@student.com',
            'role_id' => 24,
            'department_id' => 21,
            //'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
            'ip_address' => '192.168.1.1',
            //'status' => '1',
            'verified_code' => '9875656457890867869778',
            'csrf_token' => 'fioyugpuiesiorgjhprauehrigpi',
            //'applicant_id' => '1',
            //'waiver_id' => '1',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

    }
} 