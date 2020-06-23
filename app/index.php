<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('BASE_URL')) define('BASE_URL', __DIR__);
if (!defined('DIR_CONTROLLERS')) define('DIR_CONTROLLERS', __DIR__ . '/src/controllers');
if (!defined('DIR_MODELS')) define('DIR_MODELS', __DIR__ . '/src/models');
if (!defined('DIR_VIEWS')) define('DIR_VIEWS', __DIR__ . '/src/views');

require __DIR__ . '/src/config/middleware.php';