<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserResetPassword extends Eloquent {

    protected $table = 'user_reset_password';

    public function relUser(){
        return $this->belongsTo('User', 'user_id', id);
    }



}
