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



    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->id;
            $query->updated_by = Auth::user()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->id;
        });
    }


}
