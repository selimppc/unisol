<?php

class User extends \Eloquent 
{
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these attributes able to be filled
	protected $fillable = array('username ', 'password ', 'email_address','user_type','join_date','last_visit','ip_address','security_question','security_answer');
    protected $table = 'user';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	// each User HAS one user_profile 
	public function user_profiles() {
		return $this->hasOne('UserProfile'); // this matches the Eloquent model
	}
	public function user_meta() {
		return $this->hasOne('UserMeta'); // this matches the Eloquent model
	}
	
	public function supporting_doc() {
        return $this->hasOne('SupportingDoc'); // this matches the Eloquent model

    }
    //shafi
    public function miscellaneous_information() {
        return $this->hasOne('MiscellaneousInformation'); // this matches the Eloquent model
    }

    public function academic_record() {
        return $this->hasOne('AcademicRecords'); // this matches the Eloquent model
    }

    public function extra_curriculam_activity() {
        return $this->hasOne('ExtraCurriculamActivity'); // this matches the Eloquent model
    }
	
}
?>