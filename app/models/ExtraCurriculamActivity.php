<?php
class ExtraCurriculamActivity extends Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('user_id', 'name', 'achievement','certificate_medal');


    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isn't what we named our database table we have to define it
    protected $table = 'extra_curriculam_activity';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function user() {
        return $this->belongsTo('User');
    }

}