<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/2015
 * Time: 2:45 PM
 */

class DegreeAdmTestSubject extends Eloquent{

    protected $table='degree_admtest_subject';

    public function relDegree(){
        return $this->belongsTo('Degree','degree_id','id');
    }

    public function relAdmTestSubject(){
        return $this->belongsTo('AdmTestSubject','admtest_subject_id','id');
    }

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