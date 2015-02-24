<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class WaiverConstraint extends Eloquent{

    protected $table='waiver_constraint';


    public function relDegreeWaiver(){
        return $this->belongsTo('DegreeWaiver', 'degree_waiver_id', 'id');
    }
} 