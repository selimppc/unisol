<?php

class Years extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'years';

	// ratna code
    public static function getYearsName($yearId){
    $data = Years::find($yearId);
	return $data->title;
	}
}
?>