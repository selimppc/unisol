<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdmQuestionEvaluation extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'adm_question_evaluation';
    protected $fillable = [
        'batch_applicant_id', 'adm_question_id', 'adm_question_items_id', 'marks',
    ];
    private $errors;
    private $rules = [
        'batch_applicant_id' => 'required|integer',
        'adm_question_id' => 'required|integer',
        'adm_question_items_id' => 'required|integer',
        'marks' => 'required|numeric',
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
    public function relBatchApplicant(){
        return $this->belongsTo('BatchApplicant', 'batch_applicant_id', 'id');
    }
    public function relAdmQuestion(){
        return $this->belongsTo('AdmQuestion', 'adm_question_id', 'id');
    }
    public function relAdmQuestionItems(){
        return $this->belongsTo('AdmQuestionItems', 'adm_question_items_id', 'id');
    }
    public function relAdmQuestionAnsText(){
        return $this->HasMany('AdmQuestionAnsText');
    }
    public function relAdmQuestionAnsRadio(){
        return $this->HasMany('AdmQuestionAnsRadio');
    }
    public function relAdmQuestionAnsCheckbox(){
        return $this->HasMany('AdmQuestionAnsCheckbox');
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