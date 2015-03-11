<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/2015
 * Time: 2:47 PM
 */

class AdmTestSubject extends Eloquent{

    protected $table='admtest_subject';

    public static function getTestSubjectName($semId)
    {
        $data = AdmTestSubject::find($semId);
        return $data->title;
    }



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