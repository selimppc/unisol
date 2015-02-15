<?php


class ApplicantProfile extends Eloquent{

    protected $table = 'applicant_profile';


    public function relApplicant(){
        return $this->belongdTo('Applicant');
    }
} 