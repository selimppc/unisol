<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/4/2015
 * Time: 9:55 AM
 */

class ApplicantSupportingDoc extends Eloquent{

    protected $table = 'applicant_supporting_doc';

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