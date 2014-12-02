<?php
class MiscellaneousInformation extends Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('user_id', 'ever_admit_this_university', 'ever_dismissed',
                                'academic_honors_received', 'ever_admit_other_uni', 'admission_test_center');


    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isn't what we named our database table we have to define it
    protected $table = 'miscellaneous_information';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function user() {
        return $this->belongsTo('User');
    }

}
