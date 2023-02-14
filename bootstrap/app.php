<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->loadEnvironmentFrom(call_user_func(function(){
    $my_http_host = strtolower(@$_SERVER['HTTP_HOST']);
    switch ($my_http_host){
        case 'layout.test':
            $myenv = 'local';
            break;
        case '22i0260.works.tw':
            $myenv = 'works';
            break;
        default:
            $myenv = 'server';
            break;
    }
    $myenv =  '.env.'. $myenv ;
    return $myenv;
}));

if(isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))){
    $app_url =	'https://'.$_SERVER['HTTP_HOST'].'/';
}else{
    $app_url  =	'http://'.$_SERVER['HTTP_HOST'].'/';
}
$_ENV['APP_URL']=$app_url ;


/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
