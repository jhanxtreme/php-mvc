<?php

class MysqlDriver extends Database{

	public function connect($link){

		//$db = DatabaseConfig::getInstance();
		$mysql = $link->getLogins();

		$db = parent::getInstance();
		return $db->DBConnection(
			$mysql['host'], 
			$mysql['username'], 
			$mysql['password'], 
			$mysql['dbname'], 
			$mysql['driver'], 
			$mysql['charset']);
	}
	
}
