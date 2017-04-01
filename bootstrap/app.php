<?php


/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../vendor/autoload.php";

use Uno\Core\Container;
use Uno\Core\Router;
use Uno\Core\ErrorHandler;
use Uno\Core\EnvironmentVariables;

(new EnvironmentVariables)->load();

(new ErrorHandler)->handle();

// Create new IoC Container instance
$container = new Container();

$container->loadDefaultBindings();

(new Router)->process(routes_path('web.php'), "App\\Controllers\\");
