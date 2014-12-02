<?php
class AcademicRecords extends Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('user_id', 'level_of_education', 'degree_name',
        'institute_name', 'board', 'group','major_subject','result_type','result','grade','grade_scale',
        'cgpa','candidate_number', 'education_medium','study_at','year_of_passing','duration','certificate','transcript');


    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isn't what we named our database table we have to define it
    protected $table = 'academic_records';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function user() {
        return $this->belongsTo('User');
    }
}