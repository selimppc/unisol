<?php
class AcmClassRoom extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_class_room';

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
}