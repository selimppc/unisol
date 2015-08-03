<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03-Aug-15
 * Time: 3:26 PM
 */

class HrLeaveTypeTable extends Seeder{
    public function run(){

        DB::table('hr_salary_grade')->delete();

        $items = array(
            array('Sick Leave', 'SKL', 'full-time',7,7),
            array('Annual Leave', 'ANL', 'permanent',7,7),
            array('Vacation leave', 'VCL', 'project',7,7),
            array('Personal Leave Time ', 'PLT', 'part-time',7,7),
            array('Paid Time Off ', 'PTO', 'contractual',7,7),
            array('Family and Medical Leave ', 'FML', 'permanent',7,7),
            array('Personal Leave of Absence', 'PLA', 'full-time',7,7),
            array('Bereavement', 'BVL', 'permanent',7,7),
        );

        foreach($items as $item) {
            HrLeaveType::create(array(
                'title' => $item[0],
                'code' => $item[1],
                'employee_type' => $item[2],
                'created_by' => $item[3],
                'updated_by' => $item[4],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }



} 