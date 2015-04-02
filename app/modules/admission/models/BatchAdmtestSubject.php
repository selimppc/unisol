<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BatchAdmtestSubject extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'batch_admtest_subject';
    protected $fillable = [
        'batch_id', 'admtest_subject_id', 'description', 'marks', 'qualify_marks', 'duration',
    ];
    private $errors;
    private $rules = [
        'batch_id' => 'required|integer',
        'admtest_subject_id' => 'required|integer',
        //'description' => 'alpha_dash',
        'marks' => 'required|numeric',
        'qualify_marks' => 'required|numeric',
        //'duration' => 'alpha_dash',
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
    public function relAdmtestSubject(){
        return $this->belongsTo('AdmTestSubject', 'admtest_subject_id', 'id');
    }
    public function relAdmQuestion(){
        return $this->HasMany('AdmQuestion');
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
    public function scopeAdmissionTestSubjectByBatchId($query , $batch_id){
        $query = BatchAdmtestSubject::join('admtest_subject', function($join)
        {
            $join->on('batch_admtest_subject.admtest_subject_id', '=', 'admtest_subject.id');
        })
            ->where('batch_admtest_subject.batch_id', '=', $batch_id)
            ->select(DB::raw('CONCAT(admtest_subject.title) AS title, batch_admtest_subject.admtest_subject_id as id'))
            ->lists('title', 'id');
        return $query;
    }

    public function scopeBatchAdmissionTestSubjectLists($query , $batch_admtest_subject_id){
        $query = BatchAdmtestSubject::join('admtest_subject', function($join)
        {
            $join->on('batch_admtest_subject.admtest_subject_id', '=', 'admtest_subject.id');
        })
            ->where('batch_admtest_subject.id', '=', $batch_admtest_subject_id)
            ->select(DB::raw('CONCAT(admtest_subject.title) AS title, batch_admtest_subject.id as id'))
            ->lists('title', 'id');
        return $query;
    }

} 