<?php

class ExmExamList extends \Eloquent
{

    protected $table = 'exm_exam_list';


    public static function getExamName($exmId){
        $data = ExmExamList::find($exmId);
        return $data->title;
    }

}