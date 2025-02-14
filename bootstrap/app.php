<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Contracts\Debug\ExceptionHandler;
use App\Exceptions\Handler;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    ) 
	
	
    ->withMiddleware(function (Middleware $middleware) {
        //
		$middleware->alias([
            'userMidware' => \App\Http\Middleware\UserMiddleware::class,
			'ownerMidware' => \App\Http\Middleware\OwnerMiddleware::class,
			'adminMidware' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
		
    })->create();

