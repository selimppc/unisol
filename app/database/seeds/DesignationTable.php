<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/8/2015
 * Time: 2:55 PM
 */

class DesignationTable extends Seeder {

    public function run(){

        DB::table('designation')->delete();

        $items = array(
            'Lecturer' => 'Lecturer',
            'Assistant Professor' => 'Assistant Professor',
            'Associate Professor' => 'Associate Professor',
            'Professor' => 'Professor',
            'Junior Accountant' => 'Junior Accountant',
            'Senior Accountant' => 'Senior Accountant',
            'Accountant' => 'Accountant',
            'Officer' => 'Officer',
            'Treasurer' => 'Treasurer',
            'Clerk' => 'Clerk',
            'Jr. Clerk' => 'Jr. Clerk',
            'Lab Assistant' => 'Lab Assistant',
            'Jr. Lab Assistant' => 'Jr. Lab Assistant',
            'Registrar' => 'Registrar',
            'Jr. Registrar' => 'Jr. Registrar',
            'Sr. Registrar' => 'Sr. Registrar',
        );

        //DegreeLevel: 'under_graduate','graduate','post_graduate','post_doctorate'
        foreach($items as $key => $val){
            Designation::insert(array(
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