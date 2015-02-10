<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/9/2015
 * Time: 1:46 PM
 */

class CourseManagementTable extends Seeder{
    public function run(){

        DB::table('course_management')->delete();

        $dept = array(1,2,3,4);
        $subject = array(
            'Algorithm' => $dept[0],
            'Data Structure'=> $dept[0],
            'Circuit Analysis'=> $dept[1],
            'Switching'=> $dept[1],
            'Numerical Analysis'=> $dept[2],
            'Geometry'=> $dept[2],
            'Accounting'=> $dept[3],
            'Finance'=> $dept[3]
        );

        foreach($subject as $key => $value){
            CourseManagement::insert(array(
                'title' => $key,
                'description' => $key,
                'department_id' => $value,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 