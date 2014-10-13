<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

abstract class BaseController{

	// the inherited class can only invoke loadModel and loadLibrary methods
	public function __call($method, $args){
		
		//load model into the controller
		if($method == "loadModel"){
			for($i=0; $i<count($args); $i++){
				if(class_exists($args[$i])){
					$this->$args[$i] = new $args[$i]();
				}
			}
		}
		
		//load library into the controller
		if($method == "loadLibrary"){
			for($i=0; $i<count($args); $i++){
				if(file_exists(LIBRARY_PATH.DS.ucfirst($args[$i]).EXT)){
					$this->$args[$i] = new $args[$i]();
				}
			}
		}
		
	}

}
