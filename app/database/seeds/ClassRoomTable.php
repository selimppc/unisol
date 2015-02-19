<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class ClassRoomTable extends Seeder {

    public function run(){

        DB::table('acm_class_room')->delete();

        $items = array(
            array(101, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(102, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(103, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(104, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(105, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(106, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(107, 'Academic Bulding', 'Ground', 1, 'Main campus', 1),
            array(201, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(202, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(203, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(204, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(205, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(206, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(207, 'Academic Bulding', 'First', 1, 'Main campus', 1),
            array(301, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(302, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(303, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(304, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(305, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(306, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(307, 'Academic Bulding', 'Second', 1, 'Main campus', 1),
            array(401, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(402, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(403, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(404, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(405, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(406, 'Academic Bulding', 'Third', 1, 'Main campus', 1),
            array(407, 'Academic Bulding', 'Third', 1, 'Main campus', 1),


        );

        foreach($items as $item) {
            AcmClassRoom::insert(array(
                'room_number' => $item[0],
                'building_name' => $item[1],
                'floor' => $item[2],
                'department_id' => $item[3],
                'address' => $item[4],
                'status' => $item[5],
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 