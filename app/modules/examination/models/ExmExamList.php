<?php

class ExmExamList extends \Eloquent
{

    protected $table = 'exm_exam_list';
    private $errors;

    public function relCourseManagement()
    {
        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');

    }


    public function ExmExaminer(){
        return $this->belongsTo('ExmExaminer');
    }

    public function relAcmMarksDistItem()
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


    public function scopeCourseList($query){
        $query = $this::join('course_management',  function($query){
            $query->on('course_management.id', '=', 'exm_exam_list.course_management_id');
        })
            ->join('course', 'course.id', '=', 'course_management.course_id')
            ->select(DB::raw('course.title as title, exm_exam_list.course_management_id as cm_id'))
            ->lists('title', 'cm_id');
        return $query;
    }

}