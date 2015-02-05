<?php

class ExmQuestionOptionAnswer extends \Eloquent
{

    protected $table = 'exm_question_opt_ans';

    private $errors;

    private $rules = array(

        'title'  => 'required',
        'answer' => 'required',


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