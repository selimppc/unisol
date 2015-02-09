<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role')->delete();
        Role::create(array(
            'code' => 'admin',
            'title' => 'admin',
            'description' => 'admin',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'faculty',
            'title' => 'faculty',
            'description' => 'faculty',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'amw',
            'title' => 'amw',
            'description' => 'amw',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'student',
            'title' => 'student',
            'description' => 'student',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'accounts',
            'title' => 'accounts',
            'description' => 'Accounts',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'librarian',
            'title' => 'librarian',
            'description' => 'Librarian',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'hr',
            'title' => 'hr',
            'description' => 'HR',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'alumni',
            'title' => 'alumni',
            'description' => 'alumni',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Role::create(array(
            'code' => 'employer',
            'title' => 'employer',
            'description' => 'employer',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));




    }
}