<?php

class UserProfile extends \Eloquent 
{
	// app/models/Fish.php


	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these attributes able to be filled
	protected $fillable = array('user_id', 'first_name','middle_name','last_name','date_of_birth','gender','image','city','state','country','zip_code');

	// LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
	// since the plural of user_profiles isnt what we named our database table we have to define it
	protected $table = 'user_profiles';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function user() {
		return $this->belongsTo('User');
	}

}


?>