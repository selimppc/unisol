<?php

class Course extends \Eloquent
{
    protected $table = 'course';

    public function relCourseManagement(){
        return $this->belongsTo('CourseManagement');
    }

    public function relSubject(){
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

    public static function getCourseName($courseId){
        $data = Course::find($courseId);
        return $data->title;
    }

    private $errors;
    // 1
    private $rules = array(
        'title' => 'required|unique:degree_level',
        'course_code'  => 'required',
        'subject_id'  => 'required',
        'description'  => 'required',
        'course_type'  => 'required',
        'evaluation_total_marks'  => 'required',
        'credit'  => 'required',
        'hours_per_credit'  => 'required',
        'cost_per_credit'  => 'required',

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

    // 2

    private $rules2 = array(
        'title' => 'required',
        'course_code'  => 'required',
        'subject_id'  => 'required',
        'description'  => 'required',
        'course_type'  => 'required',
        'evaluation_total_marks'  => 'required',
        'credit'  => 'required',
        'hours_per_credit'  => 'required',
        'cost_per_credit'  => 'required',

    );

    public function validate2($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules2);
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

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->id;
            $query->updated_by = Auth::user()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->id;
        });
    }

}
?>