<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Course extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='course';
    protected $fillable = [
        'title', 'course_code', 'subject_id', 'course_type_id', 'description', 'evaluation_total_marks',
        'credit', 'hours_per_credit', 'cost_per_credit', 'evaluation_system'
    ];
    private $errors;
    private $rules = [
        'title' => 'required|alpha_dash',
        'course_code' => 'required|alpha_dash',
        'subject_id' => 'required|integer',
        'course_type_id' => 'required|integer',
        'description' => 'alpha_dash',
        'evaluation_total_marks' => 'numeric',
        'credit' => 'numeric',
        'hours_per_credit' => 'numeric',
        'cost_per_credit' => 'numeric',
        'evaluation_system' => 'alpha_dash',
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
        return $this->HasMany('BatchCourse');
    }
    public function relDegreeCourse(){
        return $this->HasMany('DegreeCourse');
    }
    public function relCourseConduct(){
        return $this->HasMany('CourseConduct');
    }

    public function relSubject(){
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }
    public function relCourseType(){
        return $this->belongsTo('CourseType', 'course_type_id', 'id');
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