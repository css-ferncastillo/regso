<?php

require_once './config/app.config.php';

require_once ROOT . 'src' .DS . 'autoload.php';

\Src\Autoload::load();

set_error_handler('Src\Log::errorHandler');
set_exception_handler('Src\Log::exceptionHandler');


\Src\Router::run(new \Src\Request());