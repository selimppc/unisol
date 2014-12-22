<?php

class Subject extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'subject';

    //Shafi
    public static function getSubjectName($subId){
        $data = Subject::find($subId);
        return $data->title;
    }
	
}
?>