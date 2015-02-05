<?php

class Subject extends \Eloquent 
{
	protected $fillable = [];
	protected $table = 'subject';


//    public function relCourse(){
//        return $this->belongsTo('Course');
//    }

    public function relDepartment(){
        return $this->belongsTo('Department', 'department_id', 'id');
    }

    //Shafi
    public static function getSubjectName($subId){
        $data = Subject::find($subId);
        return $data->title;
    }

}
?>