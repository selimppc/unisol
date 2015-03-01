<?php
class AcmAcademicStudentActivity extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_academic_student_activity';


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