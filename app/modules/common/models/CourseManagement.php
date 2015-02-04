<?php
/**
 *
 *
 * */
class CourseManagement extends Eloquent
{

    protected $table = 'course_management';

    public function year(){
        return $this->belongsTo('Year');
    }

    public function semester(){
        return $this->belongsTo('Semester');
    }

    public function coursetype(){
        return $this->belongsTo('CourseType', 'course_type_id', 'id');
    }

    public function course(){
        return $this->belongsTo('Course');
    }

    public function degreeprogram(){
        return $this->belongsTo('DegreeProgram');
    }

    public function exmquestion(){
        return $this->belongsTo('ExmQuestion');
    }

    public static function getCourseInfo($exmId){
        $data = CourseManagement::find($exmId);
        return $data->start_date;
    }
    public static function getCourseManagementName($courseMId){
        $data = CourseManagement::find($courseMId);
        return $data->title;
    }
}