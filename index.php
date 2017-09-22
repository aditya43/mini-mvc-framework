<?php

use Adi\Core\Request;
use Adi\Core\Router;

require 'vendor/autoload.php';
require 'core/bootstrap.php';

/**
 * Direct incoming request to defined route.
 */
Router::load('app/routes.php')->direct(Request::uri(), Request::method());
