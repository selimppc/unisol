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
        return $this->belongsTo('Degree','admtest_subject_id','id');
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