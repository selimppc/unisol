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
            'description' => 'Computer Science and Engineering',
            'dept_head_user_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Department::create(array(
            'title' => 'EEE ',
            'description' => 'Electrical and Electronics Engineering',
            'dept_head_user_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        Department::create(array(
            'title' => 'MATH',
            'description' => 'Applied Mathematics',
            'dept_head_user_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Department::create(array(
            'title' => 'BBA',
            'description' => 'Bachelor of Business Administration',
            'dept_head_user_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));


    }
} 