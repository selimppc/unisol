<?php
class AcmAcademicDetails extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic_details';
    protected $fillable = [
        'acm_academic_id', 'file', 'instruction', 'status'
    ];

    private $errors;
    private $rules = [
        'acm_academic_id' => 'required|integer',
        'file' => 'required',
        'instruction' => 'required',
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
    public function relAcmAcademicStudentActivity(){
        return $this->HasMany('AcmAcademicStudentActivity');
    }

    public function relAcmAcademic(){
        return $this->belongsTo('AcmAcademic', 'acm_academic_id', 'id');
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