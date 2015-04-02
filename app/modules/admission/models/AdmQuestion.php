<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdmQuestion extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'adm_question';
    protected $fillable = [
        'batch_admtest_subject_id', 'examiner_faculty_user_id', 'title', 'deadline', 'total_marks',
        'status',
    ];
    private $errors;
    private $rules = [
        'batch_admtest_subject_id' => 'integer',
        'examiner_faculty_user_id' => 'integer',
        'title' => 'required',
        'deadline' => 'date',
        'total_marks' => 'numeric',
        //'status' => 'alpha_dash',
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
    public function relBatchAdmtestSubject(){
        return $this->belongsTo('BatchAdmtestSubject', 'batch_admtest_subject_id', 'id');
    }
    public function relUser(){
        return $this->belongsTo('User', 'examiner_faculty_user_id', 'id');
    }
    public function relAdmQuestionComments(){
        return $this->HasMany('AdmQuestionComments');
    }
    public function relAdmQuestionEvaluation(){
        return $this->HasMany('AdmQuestionEvaluation');
    }
    public function relAdmQuestionItems(){
        return $this->HasMany('AdmQuestionItems');
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

    public function scopeAdmissionExaminerList($query , $batch_id){
        $query = AdmExaminer::join('user_profile', function($join)
        {
            $join->on('adm_examiner.user_id', '=', 'user_profile.user_id');
        })
            ->where('adm_examiner.batch_id', '=', $batch_id)
            ->select(DB::raw('CONCAT(user_profile.first_name, " ", user_profile.middle_name, " ", user_profile.last_name) AS full_name, adm_examiner.user_id as id'))
            ->lists('full_name', 'id');
        return $query;
    }

} 