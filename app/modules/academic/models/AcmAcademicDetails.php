<?php
class AcmAcademicDetails extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_academic_details';

    public function relAcmAcademic()
    {
        return $this->belongsTo('AcmAcademic','acm_academic_id','id');
    }

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->id;
            $query->updated_by = Auth::user()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->id;
        });
    }

}