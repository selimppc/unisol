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

    //static function to calculate either partial done or no starts
    public static function getCourseItemStatus($course_id, $evalution_marks)
    {
        $totalEntry = 0;
        $datas = AcmCourseConfig::where('course_id', '=', $course_id)->get();
        if (count($datas) > 0) {
            foreach ($datas as $item_marks) {
                if($item_marks->marks > 0)
                {
                    $percent = ($item_marks->marks / round($evalution_marks)) * 100;
                    $totalEntry += $percent;
                }
            }
//            if($totalEntry == 100)
//            {
//                return 'Done';
//            }
            if ($totalEntry < 100 && $totalEntry > 0) {
                return 'Partial';
            }
            else
            {
                return 'Distribution Item added';
            }
        }
        else
        {
            return 'No Distribution Item added';
        }

    }
    //static function ends here


}