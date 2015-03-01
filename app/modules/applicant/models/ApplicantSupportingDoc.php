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
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }

} 