<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2014
 * Time: 12:42 PM
 */

class Department extends Eloquent {

    protected $table = 'department';

    private $errors;

    private $rules = array(
        'title' => 'required|unique:department',
        'description'  => 'required',

    );

    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails())
        {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    //(ratna)get the department name according their id in show.blade.php; this function only return the department name using department id from subject table

       public static function getDepartmentName($deptId){
    	$data = Department::find($deptId);
		return $data->title;
    }


} 

