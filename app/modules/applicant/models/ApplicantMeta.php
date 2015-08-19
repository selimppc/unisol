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
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->created_by = Auth::applicant()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->updated_by = Auth::applicant()->get()->id;
            }
        });
    }

} 