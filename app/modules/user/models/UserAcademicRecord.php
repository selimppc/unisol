<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAcademicRecord extends Eloquent {

    protected $table = 'user_academic_record';

    public function relUser(){
        return $this->belongsTo('User', 'user_id', 'id');
    }



}
