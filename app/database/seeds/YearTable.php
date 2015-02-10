<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/9/2015
 * Time: 1:46 PM
 */

class YearTable extends Seeder{
    public function run(){

        DB::table('year')->delete();

        for($i = 2000; $i <= 2030 ; $i++){
            Year::insert(array(
                'title' => $i,
                'description' => $i,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 