<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15-Mar-15
 * Time: 3:07 PM
 */

class CourseConduct  extends Eloquent{

    protected $table = 'course_conduct';

    public function relDepartment(){
        return $this->belongsTo('Department', 'id');
    }

    public function relSubject(){
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

} 