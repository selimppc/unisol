<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class UserProfileTable extends Seeder {

    public function run(){

        DB::table('board_university')->delete();

        $items = array(
            array(2, 'MA', 'H', 'Hamid', '1982-02-04', 'male', 'Gazipur', 'Dahaka', 'Bangladesh', 1234),
            array(3, 'Mr', 'K', 'Tofael', '1982-02-04', 'male', 'Gazipur', 'Dahaka', 'Bangladesh', 1234),
            array(4, 'Ch', 'H', 'Answer', '1982-02-04', 'male', 'Gazipur', 'Dahaka', 'Bangladesh', 1234),
            array(5, 'MA', 'P', 'Tanha', '1982-02-04', 'male', 'Gazipur', 'Dahaka', 'Bangladesh', 1234),
            array(6, 'Moh', 'J', 'Suraj', '1982-02-04', 'male', 'Gazipur', 'Dahaka', 'Bangladesh', 1234),

        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $val){
            UserProfile::insert(array(
                'user_id' => $val[0],
                'first_name' =>$val[1],
                'middle_name' =>$val[2],
                'last_name' => $val[3],
                'date_of_birth' => $val[4],
                'gender' => $val[5],
                'city' => $val[6],
                'state' => $val[7],
                'country' => $val[8],
                'zip_code' => $val[9],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 