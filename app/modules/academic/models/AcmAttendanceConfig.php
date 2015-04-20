<?php


class AcmAttendanceConfig extends Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_attendance_config';
    protected $fillable = [
        'course_type_id', 'acm_marks_dist_item_id',
    ];

    private $errors;
    private $rules = [
        'course_type_id' => 'required|integer',
        'acm_marks_dist_item_id' => 'required|integer',
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
    public function relCourseType(){
        return $this->belongsTo('CourseType', 'course_type_id', 'id' );
    }

    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item', 'id');
    }

    public function relAcmMarksDistribution(){
        return $this->HasMany('AcmMarksDistribution');
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