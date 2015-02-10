<?php
class AcmMarksDistribution extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_marks_distribution';


    public function relCourseManagement()
    {
        return $this->belongsTo('CourseManagement', 'course_management_id', 'id');
    }
    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDist', 'acm_marks_dist_item_id', 'id');
    }
    public function relAcmMarksPolicy(){
        return $this->belongsTo('AcmMarksPolicy', 'acm_marks_policy_id', 'id');
    }

}