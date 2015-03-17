<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BatchApplicant extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'batch_applicant';
    protected $fillable = [
        'batch_id', 'applicant_id', 'admtest_marks', 'merit_position', 'status',
    ];
    private $errors;
    private $rules = [
        'batch_id' => 'required|integer',
        'applicant_id' => 'required|integer',
        'admtest_marks' => 'required|numeric',
        'merit_position' => 'required|numeric',
        'status' => 'alpha',
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
    public function relApplicant(){
        return $this->belongsTo('Applicant', 'applicant_id', 'id');
    }
    public function relExmCenterApplicantChoice(){
        return $this->HasMany('ExmCenterApplicantChoice');
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