<?php
class AcmAcademic extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acm_academic';
    protected $fillable = [
        'course_conduct_id', 'acm_marks_distribution_id', 'title', 'description','acm_class_schedule_id',
        'status'
    ];

    private $errors;
    private $rules = [
        'course_conduct_id' => 'required|integer',
        'acm_marks_distribution_id' => 'required|integer',
        'acm_class_schedule_id' => 'required|integer',
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
        return $this->HasMany('AcmAcademicAssignStudent');
    }
    public function relAcmAcademicDetails(){
        return $this->HasMany('AcmAcademicDetails');
    }

    public function relCourseConduct(){
        return $this->belongsTo('CourseConduct', 'course_conduct_id', 'id');
    }
    public function relAcmMarksDistribution(){
        return $this->belongsTo('AcmMarksDistribution', 'acm_marks_distribution_id', 'id');
    }
    public function relAcmClassSchedule(){
        return $this->belongsTo('AcmClassSchedule', 'acm_class_schedule_id', 'id');
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