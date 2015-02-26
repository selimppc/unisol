<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class WaiverConstraint extends Eloquent{

    protected $table='waiver_constraint';

    protected $fillable = [
        'degree_waiver_id',
        'is_time_dependent',
        'start_date',
        'end_date',
        'level_of_education',
        'gpa',
    ];


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


    public function relDegreeWaiver(){
        return $this->belongsTo('DegreeWaiver', 'degree_waiver_id', 'id');
    }
} 