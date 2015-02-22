<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Authentication Driver
	|--------------------------------------------------------------------------
	|
	| This option controls the authentication driver that will be utilized.
	| This driver manages the retrieval and authentication of the users
	| attempting to get access to protected areas of your application.
	|
	| Supported: "database", "eloquent"
	|
	*/

	'driver' => 'eloquent',
    'username' => 'username',
    'password' => 'hashed_password',
	'model' => 'User',
    'table' => 'user',


    /*'multi' => array(
        'applicant' => array(
            'driver' => 'eloquent',
            'model' => 'Applicant',
            'table' => 'applicant',
        )
    ),*/


	'reminder' => array(
		'email' => 'emails.auth.reminder',
		'table' => 'password_reminders',
		'expire' => 60,
	),

);
