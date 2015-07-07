<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role')->delete();

        $items = array(
            array('admin', 'admin', 'admin', 1, 1, 1),
            array('faculty', 'faculty', 'faculty', 1, 1, 1),
            array('amw', 'amw', 'amw', 1, 1, 1),
            array('student', 'student', 'student', 1, 1, 1),
            array('accounts', 'accounts', 'accounts', 1, 1, 1),
            array('librarian', 'librarian', 'librarian', 1, 1, 1),
            array('hr', 'hr', 'hr', 1, 1, 1),
            array('alumni', 'alumni', 'alumni', 1, 1, 1),
            array('employee', 'employee', 'employee', 1, 1, 1),
            array('applicant', 'applicant', 'applicant', 1, 1, 1),
        );

        foreach($items as $item) {
            Role::create(array(
                'code' => $item[0],
                'title' => $item[1],
                'description' => $item[2],
                'status' => $item[3],
                'created_by' => $item[4],
                'updated_by' => $item[5],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}