<?php

class ExmQuestionItems extends \Eloquent
{

    protected $table = 'exm_question_items';

    private $errors;

    private $rules = array(

        'title'  => 'required',
//        'question_type'  => 'required',
        'marks' => 'required',
    );

    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails())
        {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }



    public static function getQuestionsName($quesId){
        $data = ExmQuestion::find($quesId);
        return $data->title;

    }

    //TODO : Model Relationship

    public function relExmQuestion(){
        return $this->belongsTo('ExmQuestion', 'exm_question_id', 'id');
    }
    public function relExmQuestionOptAns(){
        return $this->HasMany('ExmQuestionOptionAnswer');
    }



    public function errors()
    {
        return $this->errors;
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
