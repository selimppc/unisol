<?php

class ExmExaminerComments extends \Eloquent
{
    protected $table = 'exm_examiner_comments';

    private $errors;


    private $rules = array(

//        'exm_exam_list_id'  => 'required',
//        'comment'  => 'required',
//        'commented_to'  => 'required',
//        'commented_by'  => 'required',
//        'status'  => 'required',

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
