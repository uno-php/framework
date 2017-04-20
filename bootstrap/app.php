<?php

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

define('UNO_PHP_START', microtime(true));

require_once __DIR__ . "/../vendor/autoload.php";

use Uno\Core\App;

$app = new App(realpath(__DIR__ . '/../'));

return $app;
