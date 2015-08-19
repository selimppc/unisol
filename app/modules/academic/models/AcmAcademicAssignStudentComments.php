<?php
class AcmAcademicAssignStudentComments extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic_assign_student_comments';
    protected $fillable = [
        'acm_assign_std_id', 'comments', 'commented_to', 'commented_by'
    ];

    private $errors;
    private $rules = [
        'acm_assign_std_id' => 'required|integer',
        //'comments' => 'required|integer',
        'commented_to' => 'integer',
        'commented_by' => 'integer',
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
    public function relAcmAcademicAssignStudent(){
        return $this->belongsTo('AcmAcademicAssignStudent', 'acm_academic_assign_student_id', 'id');
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