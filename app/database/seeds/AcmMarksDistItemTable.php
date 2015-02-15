<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class AcmMarksDistItemTable extends Seeder {

    public function run(){

        DB::table('acm_marks_dist_item')->delete();

        AcmMarksDistItem::insert(array(
            'code' => '',
            'title' => '',
            'is_associative' => '',
            'is_exam' => '',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));



    }
} 