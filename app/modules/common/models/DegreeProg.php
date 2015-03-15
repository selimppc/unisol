<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/21/2014
 * Time: 1:59 PM
 */

class DegreeProg extends Eloquent{
    protected $table = 'degree_program';


    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }

} 