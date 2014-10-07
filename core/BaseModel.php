<?php

class BaseModel{

	private $_db;

	function __construct(){

		//set an database instance
		$link = DatabaseConfig::getInstance();

		// get database driver name	
		$driverName = ucwords($link->getDriver()) . 'Driver';

		//create the database driver
		$driver = new $driverName();

		//create a connection to the database driver
		$this->_db = $driver->connect($link);
	}
	
	/*
	public static function __callStatic($name, $arguments){
		$methods = array('query');
		$this->$name($arguments);
	}*/
	
	protected function queryAll($table){
		$sql = "SELECT * FROM {$table}";
		$sth = $this->_db->prepare($sql);
		$sth->execute();
		$results = $sth->fetchAll();
		return $results;
	}

	protected function queryFrom($table, $sql){
		$sth = $this->_db->prepare($sql);
		$sth->execute();
		$results = $sth->fetchAll();
		return $results;
	}
	
	//close db connection
	public function __destruct(){
		//echo "connection lost.";
		$this->_db = null;
	}

}