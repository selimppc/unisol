<?php
class AcmAcademicDetails extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_academic_details';

    public function relAcmAcademic()
    {
        return $this->belongsTo('AcmAcademic','acm_academic_id','id');
    }

}