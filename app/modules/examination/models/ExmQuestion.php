<?php

class ExmQuestion extends \Eloquent
{
    protected $table = 'exm_questions';

    private $errors;

    public static function getYear($id){
        $data = Year::find($id);
        return $data->title;
    }

    public function getCourseManageId($id){
        $data = CourseManagement::find($id);
        return $data;
    }

    public function getExamItemList($id){
        $data = ExmExamList::find($id);
        $course_manage_id = $data->cousre_management_id;
        return getCourseManageId($course_manage_id);
    }





    // 1
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
?>