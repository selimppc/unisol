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
        return $this->belongsTo('CourseType');
    }

    public function course(){
        return $this->belongsTo('Course');
    }

    public function degreeprogram(){
        return $this->belongsTo('DegreeProgram');
    }



    public static function getCourseInfo($exmId){
        $data = CourseManagement::find($exmId);
        return $data->start_date;
    }

}