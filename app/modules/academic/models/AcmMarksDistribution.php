<?php
class AcmMarksDistribution extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_marks_distribution';
    protected $fillable = [
        'course_conduct_id', 'acm_marks_dist_item_id', 'marks', 'note','acm_marks_policy',
        'is_attendance', 'acm_attendance_config_id', 'is_default', 'is_readonly'
    ];

    private $errors;
    private $rules = [
        'course_conduct_id' => 'required|integer',
        'acm_marks_dist_item_id' => 'required|integer',
        //'marks' => 'required|integer',
        //'note' => 'required|integer',
        //'acm_marks_policy' => 'required|integer',
        'is_attendance' => 'required|integer',
        'acm_attendance_config_id' => 'required|integer',
        'is_default' => 'required|integer',
        'is_readonly' => 'required|integer',
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
    public function relAcmAcademic(){
        return $this->HasMany('AcmAcademic');
    }

    public function relCourseConduct(){
        return $this->belongsTo('CourseConduct', 'course_conduct_id', 'id');
    }

    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
    }
    public function relAcmAttendanceConfig(){
        return $this->belongsTo('AcmAttendanceConfig', 'acm_attendance_config_id', 'id');
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