<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2014
 * Time: 12:42 PM
 */

class Department extends Eloquent {

    protected $table = 'department';

    //get the department name according their id in show.blade.php; this function only return the department name using department id from subject table
    public static function getDepartmentName($deptId){
    	$data = Department::find($deptId);
    	return $data->title;
    }

} 

