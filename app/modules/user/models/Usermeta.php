<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usermeta extends Eloquent {

    protected $table = 'user_meta';



    public function user(){
        return $this->belongsTo('user', 'user_id', 'id');
    }

}
