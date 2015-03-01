<?php

class DegreeProgram extends \Eloquent
{
	protected $fillable = [];
	protected $table = 'degree_program';


	// ratna code
    public static function getDegreeProgramName($degreeId)
    {
        $data = DegreeProgram::find($degreeId);
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
