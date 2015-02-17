<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserSupportingDoc extends Eloquent {

    protected $table = 'user_supporting_doc';

    public function relUser(){
        return $this->belongsTo('User', 'user_id', id);
    }



}
