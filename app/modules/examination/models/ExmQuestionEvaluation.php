<?php

class ExmQuestionEvaluation extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'exm_question_evaluation';
    protected $fillable = [
        'exm_question_id','exm_question_items_id', 'student_user_id', 'marks', 'note','evaluator_user_id'
    ];

    private $errors;
    private $rules = [
        'student_user_id' => 'integer',
        'exm_question_id' => 'integer',
        'exm_question_items_id' => 'integer',
        'marks' => 'numeric',
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
    public function relStudentUser(){
        return $this->belongsTo('User', 'student_user_id', 'id');
    }

    public function relExmQuestion(){
        return $this->belongsTo('ExmQuestion', 'exm_question_id', 'id');
    }
    public function relExmQuestionItems(){
        return $this->belongsTo('ExmQuestionItems', 'exm_question_items_id', 'id');
    }

    public function relExmQuestionAnsText(){
        return $this->HasOne('ExmQuestionAnsText');
    }
    public function relExmQuestionAnsRadio(){
        return $this->HasMany('ExmQuestionAnsRadio');
    }
    public function relExmQuestionAnsCheckbox(){
        return $this->HasMany('ExmQuestionAnsCheckbox');
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
