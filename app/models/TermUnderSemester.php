<?php

class TermUnderSemester extends \Eloquent
{
	protected $fillable = [];
	protected $table = 'courses_under_semester';

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
?>