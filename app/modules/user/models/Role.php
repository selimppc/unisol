<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Role extends Eloquent {

    protected $table = 'role';
    protected $fillable = array('code','title','description','status','created_by','updated_by');

    public function relUser(){
        return $this->belongsToMany('User');
    }

} 