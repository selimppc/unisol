<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/22/2014
 * Time: 1:15 PM
 */

class RoleTask  extends Eloquent{

    protected $table = 'role_task';

    //Shafi
    public static function getRoleTaskName($roletaskId){
        $data = RoleTask::find($roletaskId);
        return $data->title;
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