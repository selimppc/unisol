<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Designation extends Eloquent {

    protected $table = 'designation';

    public function relUser(){
        return $this->belongsToMany('User');
    }

} 