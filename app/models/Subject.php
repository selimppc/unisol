<?php

class Subject extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'subject';


    public function course(){
        return $this->belongsTo('Course');
    }

    public function department(){
        return $this->belongsTo('Department');
    }

    //Shafi
    public static function getSubjectName($subId){
        $data = Subject::find($subId);
        return $data->title;
    }

}
?>