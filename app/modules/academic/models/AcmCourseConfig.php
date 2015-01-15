<?php


class AcmCourseConfig extends Eloquent
{

    protected $table = 'acm_course_config';

    private $errors;
    // 1 Create data validation
    private $rules = array(

        'acm_marks_dist_item_id' =>'required',
        'marks' =>'required|numeric',
        'readonly' =>'required'

    );

    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails()) {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }

    // 2 update data validation

    private $rules2 = array(
        'acm_marks_dist_item_id' =>'required',
        'marks' =>'required|numeric',
        'readonly' =>'required'

    );

    public function validate2($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules2);

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