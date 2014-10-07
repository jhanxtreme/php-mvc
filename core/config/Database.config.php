<?php

class DatabaseConfig{

	private $_host;
	private $_username;
	private $_password;
	private $_dbname;
	private $_driver;
	private $_charset;

	private static $_instance;

	public static function getInstance(){
		if(!self::$_instance){
			$class = __CLASS__;
			self::$_instance = new $class();
		}		
		return self::$_instance;
	}

	public function getDriver(){
		return $this->_driver;
	}

	public function setLogins($data){
		$this->_host = $data['host'];
		$this->_username = $data['username'];
		$this->_password = $data['password'];
		$this->_dbname = $data['dbname'];
		$this->_driver = $data['driver'];
		$this->_charset = $data['charset'];
	}

	public function getLogins(){
		return [
			'host' 		=> $this->_host,
			'username'	=> $this->_username,
			'password'	=> $this->_password,
			'dbname'	=> $this->_dbname,
			'driver'	=> $this->_driver,
			'charset'	=> $this->_charset
		];
	}

}