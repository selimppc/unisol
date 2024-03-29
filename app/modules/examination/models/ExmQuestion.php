<?php

class ExmQuestion extends \Eloquent
{
    protected $table = 'exm_question';

    private $errors;

    public function relCourseManagement()
    {
        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');

    }

    public static function getExamName($exmId){
        $data = ExmExamList::find($exmId);
        return $data->title;
    }


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
