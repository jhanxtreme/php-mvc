<?php

class Database {

	private $_host;
	private $_username;
	private $_password;
	private $_dbname;
	private $driver;
	private $charset;

	private static $_instance;

	public static function getInstance(){
		if(!self::$_instance){
			$class = __CLASS__;
			self::$_instance = new $class();
		}
		return self::$_instance;
	}

	public function set($h, $u, $p, $db, $dr, $ch){
		$this->_host = $h;
		$this->_username = $u;
		$this->_password = $p;
		$this->_dbname = $db;
		$this->_driver = $dr;
		$this->_charset = $ch;
	}
	
	public function connect(){
		try{
			$link = new PDO("{$this->_driver}:host={$this->_host};dbname={$this->_dbname};charset={$this->_charset}", $this->_username, $this->_password);
			return $link;
		}catch(PDOException $e){
			die('Unable to connect to the database.');
			//die($e->getMessage());
		}
	}
	
}
