<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24-May-15
 * Time: 4:11 PM
 */

class ExmVQuestionEvaluation extends Eloquent{

    protected $table = 'exm_v_question_evaluation';

    public function relExmQuestionOptionAnswer(){
        return $this->HasMany('ExmQuestionOptionAnswer', 'exm_question_items_id', 'exm_question_items_id');
    }

    public function relExmQuestionItems(){
        return $this->belongsTO('ExmQuestionItems', 'exm_question_items_id', 'id');
    }
} 