<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;
use Illuminate\Support\Facades\Log;



if( Config::get('app.debug') === true ){

    Log::info('Log message', ['context' => 'Other helpful information']);

// create a log channel
    $log = new Logger('log');
    $logFile = storage_path('logs/query.log');
    $log->pushHandler(new StreamHandler($logFile, Logger::WARNING));

    // add records to the log

//    $log->addRecord($levels, $message, $context = array(
//        'message'=> $message,
//        //'user_id'=> Auth::user()->username,
//    ));
//
//
//
//    Log::listen(function($levels, $message, $context)
//        //DB::listen(function($sql, $bindings, $time)
//    {
//        print_r("OK");exit;
//        $message = 'MMy message.';
//        $logFile = storage_path('logs/query.log');
//        //$user_id =  Auth::user()->username;
//
//        $monolog = Log::getMonolog();
//        $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
//        $monolog->info($level, compact('message', 'context', 'user_id'));
//    });
//}


//// some handlers
//$logFile = storage_path('logs/query.log');
//$stream = new StreamHandler($logFile, Logger::DEBUG);
//$firephp = new FirePHPHandler();
//
//// Create the main logger of the app
//$logger = new Logger('selim');
//$logger->pushHandler($stream);
//$logger->pushHandler($firephp);



//
//// Create a logger for the security-related stuff with a different channel
//$securityLogger = new Logger('security');
//$securityLogger->pushHandler($stream);
//$securityLogger->pushHandler($firephp);
//
//
//
//
//// the default date format is "Y-m-d H:i:s"
//$dateFormat = "Y n j, g:i a";
//// the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
//$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
//// finally, create a formatter
//$formatter = new LineFormatter($output, $dateFormat);
//
//
//// Create a handler
//$stream = new StreamHandler($logFile, Logger::DEBUG);
//$stream->setFormatter($formatter);
//// bind it to a logger object
//$securityLogger = new Logger('security');
//$securityLogger->pushHandler($stream);
//
//
//// You can now use your logger
//$logger->addInfo('Username', array(
//    'security'=>$securityLogger,
//    'username' => Auth::user()->username
//));
//



//
//if( Config::get('app.debug') === true ){
//    DB::listen(function($sql, $bindings, $time){
//        $logFile = storage_path('logs/query.log');
//        $user_id =  Auth::user()->username;
//        $monolog = new Logger('log');
//        $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
//        $monolog->info($sql, compact('bindings', 'time', 'user_id'));
//    });
//
//    Log::listen(function($level, $message, $context)
//    {
//        $logFile = storage_path('logs/query1.log');
//
//        $monolog = new Logger('log');
//        $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
//        $monolog->info($level, compact('message', 'context'));
//    });
//
//}