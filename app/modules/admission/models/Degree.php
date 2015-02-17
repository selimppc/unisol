<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Degree extends Eloquent{

    protected $table='degree';

    public function relYear(){
        return $this->hasMany('Year');
    }

    public function relSemester(){
        return $this->hasMany('Semester');
    }

    public function relApplicantDegree(){
        return $this->belongsTo('ApplicantDegree');
    }

    public function relDepartment(){
        return $this->hasMany('Department');
    }

} 