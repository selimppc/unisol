<?php
class AcmAcademicStudentActivity extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic_student_activity';
    protected $fillable = [
        'acm_academic_details_id', 'user_id', 'is_view', 'is_download','is_exam'
    ];

    private $errors;
    private $rules = [
        'acm_academic_details_id' => 'required|integer',
        'user_id' => 'required|integer',
        //'is_view' => 'required',
        //'is_download' => 'required',
        //'is_exam' => 'required',

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
    public function relAcmAcademicDetails(){
        return $this->belongsTo('AcmAcademicDetails', 'acm_academic_details_id', 'id');
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