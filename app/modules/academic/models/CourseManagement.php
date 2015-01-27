<?php

class CourseManagement extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'course_management';
    //for amw to get course_management_id
    public static function getCourseManagementName($courseMId){
        $data = CourseManagement::find($courseMId);
        return $data->title;
    }

}