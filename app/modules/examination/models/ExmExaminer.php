<?php

class ExmExaminer extends \Eloquent
{
    protected $table = 'exm_examiner';

    private $errors;

    public function relExmExamList(){
        return $this->belongsTo('ExmExamList','exm_exam_list_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','user_id','id');
    }

//    public function relCourseManagement()
//    {
//        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');
//
//    }



    private $rules = array(

//        'exm_exam_list_id'  => 'required',
//        'user_id'  => 'required',

//        'type'  => 'required',
//        'assigned_by'  => 'required',
//        'deadline'  => 'required',
//        'note'  => 'required',
//        'status'  => 'required',

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
