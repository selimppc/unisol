<?php

class DegreeProgram extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'degree_program';

	
	// ratna code
    public static function getDepartmentName($degId){
    $data = DegreeProgram::find($degId);
	return $data->title;
	
 }
}
?>