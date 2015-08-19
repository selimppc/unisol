<?php
class AcmAcademicAssignStudent extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic_assign_student';
    protected $fillable = [
        'acm_academic_id', 'student_user_id', 'assigned_by', 'exm_question_id','marks',
        'status'
    ];

    private $errors;
    private $rules = [
        'acm_academic_id' => 'required|integer',
        'student_user_id' => 'required|integer',
        'assigned_by' => 'required|integer',
        'exm_question_id' => 'required|integer',
        'marks' => 'required',
        //'status' => 'required|integer',
    ];

    public function validate($data)
    {
        $validate = Validator::make($data, $this->rules);
        if ($validate->fails())
        {
            $this->errors = $validate->errors();
            return false;
        }
        return true;
    }
    public function errors()
    {
        return $this->errors;
    }


    //TODO : Model Relationship
    public function relAcmAcademicAssignStudentSubmission(){
        return $this->HasMany('AcmAcademicAssignStudentSubmission');
    }
    public function relAcmAcademicAssignStudentComments(){
        return $this->HasMany('AcmAcademicAssignStudentComments');
    }

    public function relAcmAcademic(){
        return $this->belongsTo('AcmAcademic', 'acm_academic_id', 'id');
    }

    public function relUser(){
        return $this->belongsTo('User', 'student_user_id', 'id');
    }

    // TODO : user info while saving data into table
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }
        });
    }


    //TODO : Scope Area

}