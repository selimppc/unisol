<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class DegreeGroupTable extends Seeder {

    public function run(){

        DB::table('degree_group')->delete();

        $items = array(
            'Sc.' => 'Science',
            'A.' => 'Arts',
            'Com.' => 'Commerce',
        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $key => $val){
            DegreeGroup::insert(array(
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