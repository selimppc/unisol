<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Degree extends Eloquent{

    protected $table='degree';

    private $errors;
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

    public static function getDegreeName($degId)
    {
        $data = Degree::find($degId);
        return $data->title;
    }



    public function relYear(){
        return $this->belongsTo('Year','year_id','id');
    }

    public function relSemester(){
        return $this->belongsTo('Semester','semester_id','id');
    }

    public function relApplicantDegree(){
        return $this->belongsTo('ApplicantDegree');
    }

    public function relDepartment(){
        return $this->belongsTo('Department', 'department_id', 'id');
    }

    public function relDegreeWaiver(){
        return $this->hasMany('DegreeWaiver');
    }

    public function relCourseManagement(){
        return $this->hasMany('CourseManagement','degree_id','id');
    }


    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->created_by = Auth::applicant()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->updated_by = Auth::applicant()->get()->id;
            }
        });
    }

} 