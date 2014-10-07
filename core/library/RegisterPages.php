<?php

class RegisterPages{

	private $_registerPages = array();
	
	private static $_instance;
	
	public static function getInstance(){
		if(!self::$_instance){
			$class = __CLASS__;
			self::$_instance = new $class();
		}
		return self::$_instance;
	}
	
	function __construct(){
		$this->getPages();
	}

	//set current pages from the controller
	protected function getPages(){
		//open directory
		$dh = opendir(APP_PATH.DS.'application'.DS.'controllers');

		//loop through the current directory in the controllers
		while(false !== ($filename = readdir($dh))) {
			if(! in_array($filename, array('..','.'))){
				$temp = str_replace('Controller.php','',$filename);
				$files[] = strtolower($temp);
			}
		}

		//set each page and link
		foreach($files as $item){
			$this->_registerPages[$item] = BASE_PATH . $item;
		}
	}

	//get current pages from the controller
	public function getMenuLinks(){
		return $this->_registerPages;
	}

}