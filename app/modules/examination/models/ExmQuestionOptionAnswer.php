<?php

class ExmQuestionOptionAnswer extends \Eloquent
{

    protected $table = 'exm_question_opt_ans';

    private $errors;

    protected $fillable = [
        'exm_question_items_id', 'title', 'answer',
    ];

    private $rules = array(
        'exm_question_items_id' => 'required|integer',
        'title'  => 'required',
        'answer' => 'required',

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

    public function errors()
    {
        return $this->errors;
    }

    //TODO : Model Relationship
    public function relExmQuestionItems(){
        return $this->belongsTo('ExmQuestionItems', 'exm_question_items_id', 'id');
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