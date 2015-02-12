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

        $admin_role_id = DB::table('role')->select('id')->where('title', 'admin')->first()->id;
        $faculty_role_id = DB::table('role')->select('id')->where('title', 'faculty')->first()->id;
        $amw_role_id = DB::table('role')->select('id')->where('title', 'amw')->first()->id;
        $student_role_id = DB::table('role')->select('id')->where('title', 'student')->first()->id;
        $applicant_role_id = DB::table('role')->select('id')->where('title', 'applicant')->first()->id;

        $cse_dept_id = DB::table('department')->select('id')->where('title', 'CSE')->first()->id;
        $eee_dept_id = DB::table('department')->select('id')->where('title', 'EEE')->first()->id;


        User::insert(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'admin@admin.com',
            'role_id' => $admin_role_id,
            'department_id' => $cse_dept_id,
            'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
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

        User::insert(array(
            'username' => 'faculty',
            'password' => Hash::make('faculty'),
            'email' => 'faculty@faculty.com',
            'role_id' => $faculty_role_id,
            'department_id' => $cse_dept_id,
            'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
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

        User::insert(array(
            'username' => 'amw',
            'password' => Hash::make('amw'),
            'email' => 'amw@amw.com',
            'role_id' => $amw_role_id,
            'department_id' => $eee_dept_id,
            'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
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

        User::insert(array(
            'username' => 'student',
            'password' => Hash::make('student'),
            'email' => 'student@student.com',
            'role_id' => $student_role_id,
            'department_id' => $eee_dept_id,
            'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
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

        User::insert(array(
            'username' => 'applicant',
            'password' => Hash::make('applicant'),
            'email' => 'applicant@applicant.com',
            'role_id' => $applicant_role_id,
            'department_id' => $eee_dept_id,
            'join_date' => '2000-12-12',
            'last_visit' => '2000-12-12',
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