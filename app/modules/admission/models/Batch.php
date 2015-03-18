<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Batch extends Eloquent{

    //TODO : model attributes rule
    protected $table = 'batch';
    protected $fillable = [
        'degree_id', 'year_id', 'semester_id', 'batch_number', 'description', 'start_date', 'end_date',
        'seat_total', 'admission_deadline', 'status'
    ];
    private $errors;
    private $rules = [
        'degree_id' => 'required|integer',
        'year_id' => 'required|integer',
        'semester_id' => 'required|integer',
        'batch_number' => 'required|alpha_num',
        //'description' => 'alpha_dash',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'seat_total' => 'required|numeric',
        'admission_deadline' => 'required|date',
        //'status' => 'alpha_dash'
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

    //TODO : model relationship
    public function relDegree(){
        return $this->belongsTo('Degree', 'degree_id', 'id');
    }
    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
    }
    public function relSemester(){
        return $this->belongsTo('Semester', 'semester_id', 'id');
    }

    public function relAdmExaminerComments(){
        return $this->HasMany('AdmExaminerComments');
    }
    public function relAdmExaminer(){
        return $this->HasMany('AdmExaminer');
    }
    public function relBatchAdmSubject(){
        return $this->HasMany('BatchAdmSubject');
    }
    public function relBatchApplicant(){
        return $this->HasMany('BatchApplicant');
    }
    public function relBatchWaiver(){
        return $this->HasMany('BatchWaiver');
    }
    public function relBatchEducationConstraint(){
        return $this->HasMany('BatchEducationConstraint');
    }

    //TODO : on Save created_by or Updated_by
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


    //TODO: Scope



} 