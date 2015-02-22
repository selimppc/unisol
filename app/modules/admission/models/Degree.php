<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Degree extends Eloquent{

    protected $table='degree';

    public function relYear(){
        return $this->belongsTo('Year','year_id','id');
    }

    public function relSemester(){
        return $this->belongsTo('Semester','semester_id','id');
    }

    public function relApplicantDegree(){
        return $this->belongsTo('ApplicantDegree');
    }

    public function relDepartment(){
        return $this->belongsTo('Department', 'department_id', 'id');
    }

} 