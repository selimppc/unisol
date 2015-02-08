<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 1:01 PM
 */

class roleTable extends Seeder {
    public function run()
    {
        $this->call('RoleTableSeeder');
    }
}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role')->delete();
        User::create(array(
            'code' => 'admin',
            'title' => 'admin',
            'description' => 'admin',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        User::create(array(
            'code' => 'faculty',
            'title' => 'faculty',
            'description' => 'faculty',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}