<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CourseConduct extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='course_conduct';
    protected $fillable = [
        'course_id', 'faculty_user_id', 'year_id', 'semester_id', 'degree_id', 'degree_course_oriented',
    ];
    private $errors;
    private $rules = [
        'course_id' => 'required|integer',
        'faculty_user_id' => 'required|integer',
        'year_id' => 'required|integer',
        'semester_id' => 'required|integer',
        'degree_id' => 'required|integer',
        'evaluation_total_marks' => 'numeric',
        'degree_course_oriented' => 'required|alpha',
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
    public function relUser(){
        return $this->belongsTo('User', 'faculty_user_id', 'id');
    }
    public function relDegree(){
        return $this->belongsTo('Degree', 'degree_id', 'id');
    }
    public function relCourseConductComments(){
        return $this->HasMany('CourseConductComments');
    }
    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
    }
    public function relSemester(){
        return $this->belongsTo('Semester', 'semester_id', 'id');
    }
    public function relCourse(){
        return $this->belongsTo('Course', 'course_id', 'id');
    }


    // TODO : user info while saving data into table
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


    //TODO : Scope Area

} 