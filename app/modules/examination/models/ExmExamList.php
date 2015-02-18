<?php

class ExmExamList extends \Eloquent
{

    protected $table = 'exm_exam_list';

    private $errors;

    public static function getExamName($exmId){
        $data = ExmExamList::find($exmId);
        return $data->title;
    }

    public function relCourseManagement()
    {
        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');

    }

//    public function relAcmMarksDistItem()
//    {
//        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
//
//    }

    public function relMeta()
    {
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
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