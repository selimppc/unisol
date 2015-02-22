<?php

class ExmExaminer extends \Eloquent
{
    protected $table = 'exm_examiner';

    private $errors;

    public function relExmExamList(){
        return $this->belongsTo('ExmExamList','exm_exam_list_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','user_id','id');
    }

    private $rules = array(

//        'title'  => 'required',
//        'exm_exam_list_id'  => 'required',
//        'title'  => 'required',
//        'title'  => 'required',
//        'title'  => 'required',
//        'title'  => 'required',

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
