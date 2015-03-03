<?php
class AcmAcademicAssignStudentComments extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_academic_assign_student_comments';

    public function relAcmAcademicAssignStudent()
    {
        return $this->belongsTo('AcmAcademicAssignStudent','acm_assign_std_id','id');
    }
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->commented_to = Auth::user()->get()->id;
            $query->commented_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }
}