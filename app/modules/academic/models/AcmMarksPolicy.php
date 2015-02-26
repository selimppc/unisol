<?php
class AcmMarksPolicy extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_marks_policy';

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