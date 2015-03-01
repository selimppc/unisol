<?php
class AcmClassSchedule extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_class_schedule';


    public function relAcmClassTime()
    {
        return $this->belongsTo('AcmClassTime','acm_class_time_id','id');
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