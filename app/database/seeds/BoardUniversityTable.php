<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class BoardUniversityTable extends Seeder {

    public function run(){

        DB::table('board_university')->delete();

        $items = array(
            array('Dhaka', 'Dhaka', 'Bangladesh', 'board'),
            array('Rajshahi', 'Rajshahi', 'Bangladesh', 'board'),
            array('Khulna', 'Khulna', 'Bangladesh', 'board'),
            array('Comilla', 'Comilla', 'Bangladesh', 'board'),
            array('Barishal', 'Barishal', 'Bangladesh', 'board'),
            array('Chittagong', 'Chittagong', 'Bangladesh', 'board'),
            array('Sylhet', 'Sylhet', 'Bangladesh', 'board'),
            array('Dhaka University', 'DU', 'Bangladesh', 'university'),
            array('Khulna University', 'KU', 'Bangladesh', 'university'),
            array('Chittagong University', 'CU', 'Bangladesh', 'university'),
            array('Jahangirnagar University', 'JU', 'Bangladesh', 'university'),
            array('Rajshahi University', 'RU', 'Bangladesh', 'university'),
            array('Islamic University', 'IU', 'Bangladesh', 'university'),
            array('Shahjalal Science and Technology University', 'SUST', 'Bangladesh', 'university'),
            array('North South University', 'NSU', 'Bangladesh', 'university'),
            array('American Internation University Bangladesh', 'AIUB', 'Bangladesh', 'university'),
            array('Brac University', 'BracU', 'Bangladesh', 'university'),
            array('South East University', 'SEU', 'Bangladesh', 'university'),
            array('Independent University', 'IUB', 'Bangladesh', 'university'),
        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $val){
            BoardUniversity::insert(array(
                'title' => $val[0],
                'code' =>$val[1],
                'country' =>$val[2],
                'board_type' => $val[3],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 