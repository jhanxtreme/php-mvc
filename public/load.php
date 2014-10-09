<?php

// SERVER ENVIRONMENT
define('SERVER_ENV','development');

// DIRECTORY SEPARATOR
define('DS', DIRECTORY_SEPARATOR);

// DOCUMENT ROOT
define('ROOT', dirname(dirname(__FILE__)));

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

// PAGE BASE PATH
$jx_root_path =  (explode('/', $_SERVER['PHP_SELF'])[1] == 'index.php') ? '' : DS.explode('/', $_SERVER['PHP_SELF'])[1];
$jx_base_path = $_SERVER['REQUEST_SCHEME'].':'.DS.DS.$_SERVER['SERVER_NAME'].$jx_root_path;

if(is_dir(ROOT.$jx_root_path)){
	define('BASE_PATH', str_replace('\\','/', $jx_base_path) . '/');
}else{
	die('Incorrect path folder to run the application.');
}


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


/* CONFIGURE DATABASE LOGINS
 * Enable to confire database 
 */

require_once(CONFIG_PATH.DS.'Database.config'.EXT);
$db_config = DatabaseConfig::getInstance();
$db_config->setLogins([
		'host' 		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '',
		'dbname'	=> 'jhanxtreme',
		'driver'	=> 'mysql',
		'charset'	=> 'utf8'
	]);



//
// INITIALIZE BOOTSTRAP AND RUN APPLICATION
//
require_once(CORE.DS.'Bootstrap'.EXT);
$app = Bootstrap::getInstance();
$app->run();