<?php


class Semester extends Eloquent
{

    protected $table = 'semester';

    private $errors;
    // 1
    private $rules = array(
        'title' => 'required|unique:semester',
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

    // 2

    private $rules2 = array(
        'title' => 'required',
        'description'  => 'required',

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