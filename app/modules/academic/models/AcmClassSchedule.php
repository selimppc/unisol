<?php
class AcmClassSchedule extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_class_schedule';


    public function relAcmClassTime()
    {
        return $this->belongsTo('AcmClassTime','acm_class_time_id','id');
    }


}