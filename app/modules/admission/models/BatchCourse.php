<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class BatchCourse extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'batch_course';
    protected $fillable = [
        'batch_id', 'course_id', 'semester_id', 'year_id', 'is_mandatory', 'major_minor'
    ];
    private $errors;
    private $rules = [
        'batch_id' => 'required|integer',
        'course_id' => 'required|integer',
        'semester_id' => 'required|integer',
        'year_id' => 'required|integer',
        'major_minor' => 'required|alpha_dash'
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
    public function relBatch(){
        return $this->belongsTo('Batch', 'batch_id', 'id');
    }
    public function relCourse(){
        return $this->belongsTo('Course', 'course_id', 'id');
    }
    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
    }
    public function relSemester(){
        return $this->belongsTo('Semester', 'semester_id', 'id');
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

    //TODO :: Scope Area
    public function courseByCourse() {
        return $this->hasMany('BatchCourse', 'id', 'id') ;
    }



} 