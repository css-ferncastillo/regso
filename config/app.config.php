<?php

date_default_timezone_set('America/Panama');
setlocale(LC_ALL, 'es_PA.UTF-8');

define('APP_NAME', 'REGSO');
define('APP_VERSION', '1.0.0');
define('APP_DEBUG', true);
define('APP_ENV', 'development');

if (isset($_GET['url'])) {
   define('APP_URI', 'http://' . $_SERVER['HTTP_HOST'] . str_replace($_GET['url'], '', $_SERVER['REQUEST_URI']));
} else {
   define('APP_URI', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}
define('APP_TIMEZONE', 'UTC-5');
define('APP_LOCALE', 'es_PA.UTF-8');
define('APP_LANG', 'es');

define('APP_CIPHER', 'AES-256-CBC');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__, 1) . DS);
define('APP', ROOT . 'app' . DS);
define('STORAGE', ROOT . 'storage' . DS);
define('CACHE', STORAGE . 'cache' . DS);
define('LOGS', STORAGE . 'logs' . DS);
define('PUBLIC_PATH', ROOT . 'public' . DS);
define('CONTROLLERS', ROOT . 'app' . DS . 'controllers' . DS);
define('MODELS', ROOT . 'app' . DS . 'models' . DS);
define('VIEWS', ROOT . 'app' . DS . 'views' . DS);
define('LAYOUTS', VIEWS . 'layouts' . DS);

if (APP_DEBUG) {
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
} else {
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
}

define('LOGIN', 'AUTH');
define('__SECRET_KEY__', sha1(md5('1q2w3e4r5t')));
define('memory_limit', '-1');

ini_set('log_errors', 1);
ini_set('error_log', LOGS . 'app_errors.log');

const DATABASE = [
    'driver'   => 'mysql',
    'hostname' => 'localhost',
    'database' => 'encuestas_sso',
    'username' => 'desarrollo',
    'password' => '123456789',
];


// var path to log file

