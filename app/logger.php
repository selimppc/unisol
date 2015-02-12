<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Illuminate\Log;
//// create a log channel
    $log = new Logger('log');
    $logFile = storage_path('logs/query.log');
    $log->pushHandler(new StreamHandler($logFile, Logger::WARNING));


    Log::listen(function($level, $message, $context)
    {
        exit("ok");
    });
    // add records to the log

//if( Config::get('app.debug') === true ) {
//    DB::listen(function ($sql, $bindings, $time) {
//
//        $logFile = storage_path('logs/query.log');
//        $user_id = Auth::user()->username;
//
//        $monolog = new Logger('log');
//        $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
//        $monolog->info($sql, compact('bindings', 'time', 'user_id'));
//    });
//
//}




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
// }
//

