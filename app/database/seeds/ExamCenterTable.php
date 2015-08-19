<?php

class ExamCenterTable extends Seeder{
    public function run(){

        DB::table('exm_center')->delete();

        $exam_center = array(
            'Dhaka' => 'Dhaka',
            'Khulna' => 'Khulna',
            'Chittagong' => 'Chittagong',
            'Sylhet' => 'Sylhet',
            'Comilla' => 'Comilla',
            'Barisal' => 'Barisal',
            'Rangpur' => 'Rangpur',
            'Rajshahi' => 'Rajshahi'
        );

        foreach($exam_center as $key => $value){
            ExmCenter::insert(array(
                'title' => $key,
                'description' => $key,
                'capacity' => 120,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 