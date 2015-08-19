<?php

class CourseTable extends Seeder{
    public function run(){

        DB::table('course')->delete();

        $dept = array(1,2,3,4);
        $course = array(
            'CSE-102' => 1,
            'CSE-103'=> 2,
            'EEE-201'=> 3,
            'EEE-202'=> 4,
            'MATH-303'=> 5,
            'BBA-410'=> 6
        );

        foreach($course as $key => $value){
            Course::insert(array(
                'title' => $key,
                'description' => $key,
                'course_code' => $key,
                'subject_id' => $value,
                'course_type_id' => $value,
                'evaluation_total_marks' => 100,
                'credit' => 3,
                'hours_per_credit' => 20,
                'cost_per_credit' => 2500,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 