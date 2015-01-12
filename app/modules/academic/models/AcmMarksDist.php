<?php


class AcmMarksDist extends Eloquent
{

    protected $table = 'acm_marks_dist_item';

    private $errors;
    // 1
    private $rules = array(
        'title' => 'required'

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


    public function errors()
    {
        return $this->errors;
    }
}