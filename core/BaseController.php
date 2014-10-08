<?php

class BaseController{

	protected $_model;

	function __construct($model){
		// $this->Employee::getAll()
		$this->loadModel($model);
	}
	
	//load model into the controller
	protected function loadModel($name){
		if(isset($name) && class_exists($name)){
			$this->$name = new $name();
			return $this->$name;
		}
	}

	//load specific libraries
	protected function loadLibrary($name){
		$name = ucwords($name);
		if( isset($name) && file_exists(LIBRARY_PATH.DS.ucfirst($name).EXT) ){
			require_once(LIBRARY_PATH.DS.ucfirst($name).EXT);
			$this->$name = $name::getInstance();
			return $this->$name;
		}
	}

}