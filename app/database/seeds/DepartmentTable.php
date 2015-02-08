<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 1:46 PM
 */

class DepartmentTable extends Seeder {

    public function run(){

        DB::table('department')->delete();
        Department::create(array(
            'title' => 'CSE',
            'description' => 'CSE',
            'dept_head_user_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Department::create(array(
            'title' => 'EEE',
            'description' => 'EEE',
            'dept_head_user_id' => 2,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        Department::create(array(
            'title' => 'Mathematics',
            'description' => 'Mathematics',
            'dept_head_user_id' => 3,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

    }
} 