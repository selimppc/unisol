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




}
