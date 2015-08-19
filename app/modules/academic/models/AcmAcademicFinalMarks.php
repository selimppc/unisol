<?php
class AcmAcademicFinalMarks extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic_final_marks';
    protected $fillable = [
        'course_conduct_id', 'acm_marks_dist_item_id', 'user_id', 'marks'
    ];

    private $errors;
    private $rules = [
        'course_conduct_id' => 'required|integer',
        'acm_marks_dist_item_id' => 'required|integer',
        'user_id' => 'required|integer',
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
    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
    }

    public function relCourseConduct(){
        return $this->belongsTo('CourseConduct', 'course_conduct_id', 'id');
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