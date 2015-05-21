<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdmQuestionItems extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'adm_question_items';
    protected $fillable = [
        'adm_question_id', 'question_type', 'title', 'marks',
    ];
    private $errors;
    private $rules = [
        'adm_question_id' => 'required|integer',
        //'question_type' => 'required',
        'title' => 'required',
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
    public function relAdmQuestion(){
        return $this->belongsTo('AdmQuestion', 'adm_question_id', 'id');
    }
    public function relAdmQuestionOptAns(){
        return $this->HasMany('AdmQuestionOptAns');
    }

    public function relAdmQuestionEvaluation(){
        return $this->HasMany('AdmQuestionEvaluation');
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