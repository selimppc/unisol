<?php

class Year extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'year';

	// ratna code
    public static function getYearsName($yearId){
        $data = Year::find($yearId);
        return $data->title;
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


