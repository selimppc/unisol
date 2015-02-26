<?php


class ApplicantProfile extends Eloquent{

    protected $table = 'applicant_profile';


    public function relApplicant(){
        return $this->belongdTo('Applicant');
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