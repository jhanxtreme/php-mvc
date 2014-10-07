<?php

class Database {

	private static $_instance;

	public static function getInstance(){
		if(!self::$_instance){
			$class = __CLASS__;
			self::$_instance = new $class();
		}
		return self::$_instance;
	}
	
	protected function DBConnection($hostname, $username, $password, $dbname, $driver, $charset){
		try{
			$link = new PDO("{$driver}:host={$hostname};dbname={$dbname};charset={$charset}", $username, $password);
			return $link;
		}catch(PDOException $e){
			die('Unable to connect to the database.');
			//die($e->getMessage());
		}
	}
	
}
