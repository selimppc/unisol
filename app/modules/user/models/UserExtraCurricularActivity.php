<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserExtraCurricularActivity extends Eloquent {

    protected $table = 'user_extra_curricular_activity';

    public function relUser(){
        return $this->belongsTo('User', 'user_id', id);
    }



}
