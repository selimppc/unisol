<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CourseEnrollment extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='course_enrollment';
    protected $fillable = [
        'batch_course_id', 'student_user_id', 'status', 'taken_in_year_id', 'taken_in_semester_id'
    ];
    private $errors;
    private $rules = [
        'batch_course_id' => 'required|integer',
        'student_user_id' => 'required|integer',
        //'status' => 'alpha_dash',
        'taken_in_year_id' => 'required|integer',
        'taken_in_semester_id' => 'required|integer',
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
    public function relBatchCourse(){
        return $this->belongsTo('BatchCourse', 'batch_course_id', 'id');
    }
    public function relUser(){
        return $this->belongsTo('User', 'student_user_id', 'id');
    }
    public function relCourseConduct(){
        return $this->HasMany('CourseConduct');
    }

    public function relYear(){
        return $this->belongsTo('Year', 'taken_in_year_id', 'id');
    }
    public function relSemester(){
        return $this->belongsTo('Semester', 'taken_in_semester_id', 'id');
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