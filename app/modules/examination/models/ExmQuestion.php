<?php

class ExmQuestion extends \Eloquent
{
    protected $table = 'exm_questions';

    private $errors;



    public static function getCourseId($exmId){
        $data = CourseManagement::find($exmId);
        return $data->year_id;
    }


    // 1
    private $rules = array(
        'exm_exam_list_id'  => 'required',
        'title'  => 'required',
        'deadline'  => 'required',
        'total_marks' => 'required',
        'created_by' => 'required',
        'updated_by' => 'required',

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
?>