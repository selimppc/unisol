<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMeta extends Eloquent {

    protected $table = 'user_meta';



    public function user(){
        return $this->belongsTo('User');
        //return $this->hasOne('user');
    }

}
