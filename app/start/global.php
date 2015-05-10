<?php

require_once app_path('logger.php');
//
//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;
///*
//|--------------------------------------------------------------------------
//| Register The Laravel Class Loader
//|--------------------------------------------------------------------------
//|
//| In addition to using Composer, you may use the Laravel class loader to
//| load your controllers and models. This is useful for keeping all of
//| your classes in the "global" namespace without Composer updating.
//|
//*/
//
//ClassLoader::addDirectories(array(
//
//	app_path().'/commands',
//	app_path().'/controllers',
//	app_path().'/models',
//	app_path().'/database/seeds',
//
//));
//
///*
//|--------------------------------------------------------------------------
//| Application Error Logger
//|--------------------------------------------------------------------------
//|
//| Here we will configure the error logger setup for the application which
//| is built on top of the wonderful Monolog library. By default we will
//| build a basic log file setup which creates a single file for logs.
//|
//*/
////old file
////Log::useFiles(storage_path().'/logs/laravel.log');
//
/////Daily Log File
//$logFile = 'laravel.log';
//Log::useDailyFiles(storage_path().'/logs/'.$logFile);
//
////$monolog = Log::getMonolog();
////$monolog->pushHandler(new Monolog\Handler\SyslogHandler('my_ident'));
//
///*
//|--------------------------------------------------------------------------
//| Application Error Handler
//|--------------------------------------------------------------------------
//|
//| Here you may handle any errors that occur in your application, including
//| logging them or displaying custom views for specific errors. You may
//| even register several error handlers to handle different types of
//| exceptions. If nothing is returned, the default error view is
//| shown, which includes a detailed stack trace during debug.
//|
//*/
//// Old code
////App::error(function(Exception $exception, $code)
////{
////	Log::error($exception);
////});
////App::error(function(RuntimeException $exception)
////{
////    //return $monolog = Log::getMonolog();
////});
//
//App::error(function(Exception $exception, $code)
//{
//
//    $pathInfo = Request::getPathInfo();
//
//    $selim = " : Edu Tech Solutions";
//    Log::error('Error', array('error' => 'Errors information. Path: '.''.$pathInfo.' Code: '.$code.''.$selim));
//
//    if (Config::get('app.debug')) {
//        return;
//    }
//
//
//    if($exception=='debug'){
//        Log::debug('Debug', array('debug' => 'Other helpful information'));
//    }elseif($exception=='information'){
//        Log::info('Information', array('information' => 'Other helpful information'));
//    }elseif($exception=='notice'){
//        Log::notice('Notice', array('notice' => 'Other helpful information'));
//    }elseif($exception=='warning'){
//        Log::warning('Warning', array('warning' => 'Other helpful information'));
//    }elseif($exception=='error'){
//        Log::error('Error', array('error' => 'Other helpful information'));
//    }elseif($exception=='critical'){
//        Log::critical('Critical', array('critical' => 'Other helpful information'));
//    }elseif($exception=='alert'){
//        Log::alert('Alert', array('alert' => 'Other helpful information'));
//    }
//    //Log::error($exception);
//
//
////    $view_log = new Logger('View Logs');
////    $view_log->pushHandler(new StreamHandler('path/to/log.log', Logger::INFO));
////    $view_log->addInfo("User $user clicked");
//
//
//});
//
///*
//|--------------------------------------------------------------------------
//| Maintenance Mode Handler
//|--------------------------------------------------------------------------
//|
//| The "down" Artisan command gives you the ability to put an application
//| into maintenance mode. Here, you will define what is displayed back
//| to the user if maintenance mode is in effect for the application.
//|
//*/
//
//App::down(function()
//{
//	//return Response::make("Be right back!", 503);
//    return Response::view('errors.down', array('title' => trans('app.error_maintenance')), 503);
//});
//
//
//App::missing(function($exception)
//{
//    return Response::view('errors.missing', array(
//        'title' => trans('app.error_404'),
//        'heading' => trans('app.error_404'),
//        'body' => trans('app.error_404_detail')), 404);
//});
//
//
///*
//|--------------------------------------------------------------------------
//| Require The Filters File
//|--------------------------------------------------------------------------
//|
//| Next we will load the filters file for the application. This gives us
//| a nice separate location to store our route and application filter
//| definitions instead of putting them all in the main routes file.
//|
//*/


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




require app_path().'/filters.php';
require_once app_path().'/helpers/helpers.php';
