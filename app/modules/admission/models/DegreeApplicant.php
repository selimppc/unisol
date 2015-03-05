<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class DegreeApplicant extends Eloquent{

    protected $table='degree_applicant';

    public function relDegree(){
        return $this->belongsTo('Degree', 'degree_id', 'id');
    }


    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
                $query->updated_by = Auth::user()->get()->id;
            }else{
                $query->created_by = Auth::applicant()->get()->id;
                $query->updated_by = Auth::applicant()->get()->id;
            }
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }

} 