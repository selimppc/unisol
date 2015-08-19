<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdmVQuestionEvaluation extends Eloquent{

    protected $table = 'adm_v_question_evaluation';

    public function relAdmQuestionOptAns(){
        return $this->HasMany('AdmQuestionOptAns', 'adm_question_items_id', 'adm_question_items_id');
    }

    public function relAdmQuestionItems(){
        return $this->belongsTO('AdmQuestionItems', 'adm_question_items_id', 'id');
    }

} 