<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class DegreeWaiver extends Eloquent{

    protected $table='degree_waiver';


    public function relWaiver(){
        return $this->belongsTo('Waiver', 'waiver_id', 'id');
    }
    public function relDegree(){
        return $this->belongsTo('Degree', 'degree_id', 'id');
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