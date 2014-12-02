<?php
class SupportingDoc extends Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('user_id', 'academic_goal_statement','essay', 'letter_of_intent','personal_statement',
                                'research_statement','portfolio', 'writing_sample','resume', 'readmission_personal_statement',
                                'other');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isn't what we named our database table we have to define it
    protected $table = 'supporting_doc';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function user() {
        return $this->belongsTo('User');
    }


}
