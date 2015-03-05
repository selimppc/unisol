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


        $users = array(
            array('admin', Hash::make('admin'), 'admin@admin.com', $admin_role_id, $cse_dept_id, '2000-12-12', '2000-12-12', '192.168.1.1', '9875656457890867869778', 'fioyugpuiesiorgjhprauehrigpi'),
            array('amw', Hash::make('amw'), 'amw@amw.com', $amw_role_id, $cse_dept_id, '2000-12-12', '2000-12-12', '192.168.1.1', '9875656457890867869778', 'fioyugpuiesiorgjhprauehrigpi'),
            array('faculty', Hash::make('faculty'), 'faculty@faculty.com', $faculty_role_id, $cse_dept_id, '2000-12-12', '2000-12-12', '192.168.1.1', '9875656457890867869778', 'fioyugpuiesiorgjhprauehrigpi'),
            array('student', Hash::make('student'), 'student@student.com', $student_role_id, $eee_dept_id, '2000-12-12', '2000-12-12', '192.168.1.1', '9875656457890867869778', 'fioyugpuiesiorgjhprauehrigpi'),
            array('applicant', Hash::make('applicant'), 'applicant@applicant.com', $applicant_role_id, $eee_dept_id, '2000-12-12', '2000-12-12', '192.168.1.1', '9875656457890867869778', 'fioyugpuiesiorgjhprauehrigpi'),
        );

        foreach($users as $user) {
            User::insert(array(
                'username' => $user[0],
                'password' => $user[1],
                'email' => $user[2],
                'role_id' => $user[3],
                'department_id' => $user[4],
                'join_date' => $user[5],
                'last_visit' => $user[6],
                'ip_address' => $user[7],
                'status' => '1',
                'verified_code' => $user[8],
                'csrf_token' => $user[9],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 