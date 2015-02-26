<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/2/2015
 * Time: 2:07 PM
 */

class ApplicantMeta extends Eloquent{

    protected $table = 'applicant_meta';

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