<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

class Database {

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

	public function set($data){
		$this->_host = $data['host'];
		$this->_username = $data['username'];
		$this->_password = $data['password'];
		$this->_dbname = $data['dbname'];
		$this->_driver = $data['driver'];
		$this->_charset = $data['charset'];
	}
	
	public function connect(){
		try{
			$pdo = new PDO("{$this->_driver}:host={$this->_host}; dbname={$this->_dbname}; 	charset={$this->_charset}", $this->_username, $this->_password);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(PDOException $e){
			die(nl2br("Unable to connect to the database. \n" .  ucfirst($e->getMessage())));
		}
	}
	
}
