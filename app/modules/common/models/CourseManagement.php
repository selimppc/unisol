<?php
/**
 *
 *
 * */
class CourseManagement extends Eloquent
{

    protected $table = 'course_management';

    public function relDepartment(){
        return $this->belongsTo('Department', 'id');
    }

    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
    }

    public function relSemester(){
        return $this->belongsTo('Semester', 'semester_id', 'id');
    }
    public function relSubject(){
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

    public function relCourseType(){
        return $this->belongsTo('CourseType', 'course_type_id', 'id');
    }

    public function relCourse(){
        return $this->belongsTo('Course', 'course_id', 'id');
    }

    public function relDegree(){
        return $this->belongsTo('Degree','degree_id','id');
    }

    public function relDegreeProgram(){
        return $this->belongsTo('DegreeProgram');
    }

    public function relUser(){
        return $this->belongsTo('User','user_id','id');
    }

    public function relExmQuestion(){
        return $this->belongsTo('ExmQuestion');
    }

    public function relExmExamList(){
        return $this->belongsTo('ExmExamList');
    }

    public static function getCourseInfo($exmId){
        $data = CourseManagement::find($exmId);
        return $data->start_date;
    }
    public static function getCourseManagementName($courseMId){
        $data = CourseManagement::find($courseMId);
        return $data->title;
    }

    public static function getCourseManagementsCourseName($courseMId){
        $data = CourseManagement::find($courseMId);
        return $data->course_id;
    }


    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }
}