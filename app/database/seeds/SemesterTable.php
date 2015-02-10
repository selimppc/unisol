<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/9/2015
 * Time: 1:46 PM
 */

class SemesterTable extends Seeder{
    public function run(){

        DB::table('semester')->delete();

        $semester = array('Spring', 'Summer', 'Fall');

        foreach($semester as $sm){
            Semester::insert(array(
                'title' => $sm,
                'description' => $sm,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 