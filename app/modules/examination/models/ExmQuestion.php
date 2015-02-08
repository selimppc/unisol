<?php

class ExmQuestion extends \Eloquent
{
    protected $table = 'exm_question';

    private $errors;

    public function relCourseManagement()
    {
        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');

    }

    private $rules = array(

        'title'  => 'required',
        'deadline'  => 'required',
        'total_marks' => 'required',


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



}
