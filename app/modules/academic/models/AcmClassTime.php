<?php
class AcmClassTime extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_class_time';

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