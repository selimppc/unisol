<?php


class AcmMarksDistItem extends Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_marks_dist_item';
    protected $fillable = [
        'code', 'title', 'is_associative', 'is_exam',
        'is_online'
    ];

    private $errors;
    private $rules = [
        'code' => 'required',
        'title' => 'required',

        'is_associative' => 'required|integer',
        'is_exam' => 'required|integer',
        'is_online' => 'required|integer',

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
    public function relAcmMarksDistribution(){
        return $this->HasMany('AcmMarksDistribution' );
    }
    public function relAcmAcademicFinalMarks(){
        return $this->HasMany('AcmAcademicFinalMarks');
    }
    public function relExmExamList(){
        return $this->HasMany('ExmExamList');
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