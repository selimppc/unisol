<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/
//old file
//Log::useFiles(storage_path().'/logs/laravel.log');

///Daily Log File
$logFile = 'laravel.log';
Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/
// Old code
//App::error(function(Exception $exception, $code)
//{
//	Log::error($exception);
//});

App::error(function(Exception $exception, $code)
{

    $pathInfo = Request::getPathInfo();

    $selim = " : Edu Tech Solutions";
    Log::error('Error', array('error' => 'Errors information. Path: '.''.$pathInfo.' Code: '.$code.''.$selim));

    if (Config::get('app.debug')) {
        return;
    }

    //var_dump($exception);


    if($exception=='debug'){
        Log::debug('Debug', array('debug' => 'Other helpful information'));
    }elseif($exception=='information'){
        Log::info('Information', array('information' => 'Other helpful information'));
    }elseif($exception=='notice'){
        Log::notice('Notice', array('notice' => 'Other helpful information'));
    }elseif($exception=='warning'){
        Log::warning('Warning', array('warning' => 'Other helpful information'));
    }elseif($exception=='error'){
        Log::error('Error', array('error' => 'Other helpful information'));
    }elseif($exception=='critical'){
        Log::critical('Critical', array('critical' => 'Other helpful information'));
    }elseif($exception=='alert'){
        Log::alert('Alert', array('alert' => 'Other helpful information'));
    }
    //Log::error($exception);


});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';
