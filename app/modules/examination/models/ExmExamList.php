<?php

class ExmExamList extends \Eloquent
{

    protected $table = 'exm_exam_list';

    private $errors;

    public static function getExamName($exmId){
        $data = ExmExamList::find($exmId);
        return $data->title;
    }


    private $rules = array(

        'title'  => 'required',

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