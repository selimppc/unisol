<?php

class ExmExamList extends \Eloquent
{

    protected $table = 'exm_exam_lists';


    public static function getExamName($exmId){
        $data = ExmExamList::find($exmId);
        return $data->title;
    }

}