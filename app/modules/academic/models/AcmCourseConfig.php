<?php


class AcmCourseConfig extends Eloquent
{

    protected $table = 'acm_course_config';

    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
    }

    public function relCourse(){
        return $this->belongsTo('Course', 'course_id', 'id');
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
                return 'Distribution Done';
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

    private $errors;
    // 1 Create data validation
    private $rules = array(

        'acm_marks_dist_item_id' =>'required',
        'marks' =>'required|numeric',
        'readonly' =>'required'

    );

    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails()) {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }

    // 2 update data validation

    /* private $rules2 = array(
        'acm_marks_dist_item_id' =>'required',
        'marks' =>'required|numeric',
        'readonly' =>'required'

    );

    public function validate2($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules2);

        // check for failure
        if ($validate->fails())
        {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }

        // validation pass
        return true;
    }*/

    public function errors()
    {
        return $this->errors;
    }

}