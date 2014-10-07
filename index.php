<?php

// SERVER ENVIRONMENT
define('SERVER_ENV','development');

// DIRECTORY SEPARATOR
define('DS', DIRECTORY_SEPARATOR);

// ROOT DIRECTORY
define('ROOT', dirname(dirname(__FILE__)));

// PROJECT FOLDER DIRECTORY
define('APP_PATH', dirname(__FILE__));

// PAGE BASE PATH
define('BASE_PATH', $_SERVER['REQUEST_SCHEME'].':'.DS.DS.$_SERVER['SERVER_NAME'].DS);

// CORE FILE DIRECTORY
define('CORE', APP_PATH . DS . 'core');

// Configuration path
define('CONFIG_PATH', CORE.DS.'config');

// LIBRARY PATH
define('LIBRARY_PATH', CORE.DS.'library');

// PUBLIC BASE PATH
define('PUBLIC_BASE_PATH', APP_PATH.DS.'public');





//
// SET ERROR REPORTING ENVIRONMENT
//
if(SERVER_ENV == 'development'){
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	ini_set('log_errors', 'On');
	ini_set('error_log', APP_PATH.DS.'temp'.DS.'error_logs'.DS.'error.log');
}else{
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', APP_PATH.DS.'temp'.DS.'error_logs'.DS.'error.log');
}




//
// CONFIGURE DATABASE LOGINS
//
require_once(CONFIG_PATH.DS.'Database.config.php');
$db_config = DatabaseConfig::getInstance();
$db_info = array(
		'host' 		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '',
		'dbname'	=> 'jx_employees',
		'driver'	=> 'mysql',
		'charset'	=> 'utf8'
	);
$db_config->setLogins($db_info);





//
// INITIALIZE BOOTSTRAP AND RUN APPLICATION
//
require_once(CORE.DS.'Bootstrap.php');
$app = Bootstrap::getInstance();
$app->run();
