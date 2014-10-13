<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

abstract class BaseController{

	//load model into the controller
	public function __call($method, $args){
		if($method == "loadModel"){
			for($i=0; $i<count($args); $i++){
				if(class_exists($args[$i])){
					$this->$args[$i] = new $args[$i]();
					$this->_models[$args[$i]] = $this->$args[$i];
				}
			}
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
