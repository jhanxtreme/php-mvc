<?php

// SERVER ENVIRONMENT
define('SERVER_ENV','development');

// DIRECTORY SEPARATOR
define('DS', DIRECTORY_SEPARATOR);

// DOCUMENT ROOT
define('ROOT', getcwd());

// PROJECT FOLDER DIRECTORY
define('APP_PATH', ROOT);

// CORE FILE DIRECTORY
define('CORE', APP_PATH . DS . 'core');

// Configuration path
define('CONFIG_PATH', CORE.DS.'config');

// LIBRARY PATH
define('LIBRARY_PATH', CORE.DS.'library');

// PUBLIC BASE PATH
define('PUBLIC_BASE_PATH', APP_PATH);

// define script extension
define('EXT', '.php');

// BASE PATH
$jx_root_path =  (explode('/', $_SERVER['PHP_SELF'])[1] == 'index.php') ? '' : DS.explode('/', $_SERVER['PHP_SELF'])[1];
$jx_base_path = $_SERVER['REQUEST_SCHEME'].':'.DS.DS.$_SERVER['SERVER_NAME'].$jx_root_path;
define('BASE_PATH', str_replace('\\','/', $jx_base_path) . '/');
