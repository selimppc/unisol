<?php

class UserMeta extends \Eloquent 
{
	// app/models/Fish.php


	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these attributes able to be filled
	protected $fillable = array('user_id', 'fathers_name','fathers_occupation','fathers_phone','freedom_fighter','mothers_name','mothers_occupation','mothers_phone','national_id','driving_license','passport','place_of_birth','marital_status','nationality','religion','signature','present_address');

	// LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
	// since the plural of user_meta isnt what we named our database table we have to define it
	protected $table = 'user_meta';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function user() {
		return $this->belongsTo('User');
	}

}


?>