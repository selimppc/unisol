<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03-Aug-15
 * Time: 2:41 PM
 */

class HrSalaryGradeTable extends Seeder{

    public function run(){

        DB::table('hr_salary_grade')->delete();

        $items = array(
            array(1, 'SG-01', 'SG-01', 'SGD-01',5000,50000, 7,7),
            array(2, 'SG-02', 'SG-02', 'SGD-02',5000,50000, 7,7),
            array(3, 'SG-03', 'SG-03', 'SGD-03',5000,50000, 7,7),
            array(4, 'SG-04', 'SG-04', 'SGD-04',5000,50000,7,7),
            array(5, 'SG-05', 'SG-05', 'SGD-05',5000,50000,7,7),
            array(6, 'SG_06', 'SG-06', 'SGD-06',5000,50000,7,7),
            array(7, 'SG-07', 'SG-07', 'SGD-07',5000,50000,7,7),
            array(8, 'SG-08', 'SG-08', 'SGD-08',5000,50000,7,7),
            array(9, 'SG-09', 'SG-09', 'SGD-09',5000,50000,7,7),
        );

        foreach($items as $item) {
            HrSalaryGrade::create(array(
                'title' => $item[0],
                'code' => $item[1],
                'type' => $item[2],
                'description' => $item[3],
                'min_amount' => $item[4],
                'max_amount' => $item[5],
                'created_by' => $item[6],
                'updated_by' => $item[7],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }

} 