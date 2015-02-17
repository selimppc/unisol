<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMiscellaneousInfo extends Eloquent {

    protected $table = 'user_miscellaneous_info';

    public function relUser(){
        return $this->belongsTo('User');
    }



}
