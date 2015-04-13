<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class DegreeLevelTable extends Seeder {

    public function run(){

        DB::table('degree_level')->delete();

        $items = array(
            'B.' => 'Bachelor',
            'M.' => 'Masters',
            'Ph.D' => 'Doctor Of Philosophy',
        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $key => $val){
            DegreeLevel::insert(array(
                'code' =>$key,
                'title' => $val,
                'description' => $val,
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 