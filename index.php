<?php

require_once './config/app.config.php';
require_once ROOT . 'core' . DS . 'autoload.php';

\Core\Autoload::load();
set_error_handler('Core\Handler::errorHandler');
set_exception_handler('Core\Handler::exceptionHandler');
\Core\Router::run(new \Core\Request());
