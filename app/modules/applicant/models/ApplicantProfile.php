<?php


class ApplicantProfile extends Eloquent{

    protected $table = 'applicant_profile';


    public function relApplicant(){
        return $this->belongsTo('Applicant');
    }
    public function relCountry(){
        return $this->belongsTo('Country','country_id','id');
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