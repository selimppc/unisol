<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class DegreeProgramTable extends Seeder {

    public function run(){

        DB::table('degree_program')->delete();


        $items = array(
            'Bangla' => 'Description of Bangla.',
            'English' => 'Description of English.',
            'Mathematics' => 'Description of Mathematics.',
            'Computer Science' => 'Description of Computer Science.',
            'Finance' => 'Description of Finance.',
            'Account' => 'Description of Account.',
        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $key => $val){
            DegreeProgram::insert(array(
                'title' => $key,
                'description' => $val,
                'degree_level' => 'under_graduate',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 