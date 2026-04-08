
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Create The Application Start Time
|--------------------------------------------------------------------------
|
| This constant is used to start measuring the time taken by Laravel
| to handle the request. Useful for debugging and performance.
|
*/
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check For Maintenance Mode
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" artisan
| command, we will require this file so that any pre-rendered content
| can be shown instead of bootstrapping the framework.
|
*/
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We'll require it into the script here so we
| don't have to worry about the loading of any of our classes.
|
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| We need to bootstrap the framework and get it ready for use, then it
| will load up this application so that we can run it and send the
| responses back to the browser and delight our users.
|
*/
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the app.
|
*/
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
