<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

class BaseModel{

	private $_db;

	function __construct(){

		//set an database instance
		$db = Database::getInstance();

		// execute database connnection
		$this->_db = $db->connect();

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

	protected function queryFrom($sql){
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
