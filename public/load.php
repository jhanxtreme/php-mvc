<?php
	
//
// INITIALIZE BOOTSTRAP
//
require_once(CORE.DS.'Bootstrap'.EXT);
$app = Bootstrap::getInstance();



//
// SET ERROR REPORTING
//
$app->setErrorReporting();



//
// CONFIGURE DATABASE
//
$app->setDatabaseConfig([
		'host' 		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '1234',
		'dbname'	=> 'test',
		'driver'	=> 'mysql',
		'charset'	=> 'utf8'
	]);



//
// RUN APPLICATION
//
$app->run();
