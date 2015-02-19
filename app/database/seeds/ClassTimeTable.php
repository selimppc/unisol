<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class ClassTimeTable extends Seeder {

    public function run(){

        DB::table('acm_class_time')->delete();

        $items = array(
            array('06:00', '07.00', 0),
            array('07:00', '08.00', 0),
            array('08:00', '09.00', 0),
            array('09:00', '10.00', 0),
            array('10:00', '10.30', 1),
            array('10:30', '11.30', 0),
            array('11:30', '12.30', 0),
            array('12:30', '13.30', 0),
            array('13:30', '14.00', 1),
            array('14:00', '15.00', 0),
            array('15:00', '16.00', 0),
            array('16:00', '17.00', 0),
            array('17:00', '18.00', 0),
            array('18:00', '19.00', 0),
            array('19:00', '20.00', 0),
            array('20:00', '21.00', 0),
            array('22:00', '23.00', 0)
        );

        foreach($items as $item) {
            AcmClassTime::insert(array(
                'start_time' => $item[0],
                'end_time' => $item[1],
                'is_break' => $item[2],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 