<?php
/**
 *
 *
 * */
class CourseManagement extends Eloquent
{

    protected $table = 'course_management';

    public static function getCourseInfo($exmId){
        $data = CourseManagement::find($exmId);
        return $data->start_date;
    }

}