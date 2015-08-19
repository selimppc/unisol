<?php

class ExmQuestionComments extends \Eloquent
{
    protected $table = 'exm_question_comments';

    //TODO :: model attributes and rules and validation

    protected $fillable = [
        'exm_question_id', 'comment', 'commented_to', 'commented_by',
    ];
    private $errors;
    private $rules = [
        'exm_question_id' => 'integer',
        //'comment' => 'alpha_dash',
        'commented_to' => 'integer',
        'commented_by' => 'integer',
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
    public function relExmQuestion(){
        return $this->belongsTo('ExmQuestion', 'exm_question_id', 'id');
    }

    public function relToUser(){
        return $this->hasOne('User', 'id', 'commented_to');
    }

    public function relByUser(){
        return $this->hasOne('User', 'id', 'commented_by');
    }






    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }




}
