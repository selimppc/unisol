<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/9/2015
 * Time: 1:46 PM
 */

class CourseTypeTable extends Seeder{
    public function run(){

        DB::table('course_type')->delete();

        $courseType = array('Theory', 'Lab', 'Thesis', 'Project', 'Industrial Tour', 'Internship');

        foreach($courseType as $ct){
            CourseType::insert(array(
                'title' => $ct,
                'description' => $ct,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 