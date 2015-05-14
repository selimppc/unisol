<?php

class ExmQuestionComments extends \Eloquent
{
    protected $table = 'exm_question_comments';



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

    // TODO : Relation
    public function relToUser(){
        return $this->hasOne('User', 'id', 'commented_to');
    }

    public function relByUser(){
        return $this->hasOne('User', 'id', 'commented_by');
    }


}
