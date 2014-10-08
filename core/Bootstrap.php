<?php

class Bootstrap{
	
	const DEFAULT_CONTROLLER = 'HomeController';
	const DEFAULT_ACTION = 'index';
	const DEFAULT_MODEL = 'Home';
	
	private static $_instance;

	function __construct(){}
	
	public static function getInstance(){
		if(!self::$_instance){
			$class = __CLASS__;
			self::$_instance = new $class();
		}
		return self::$_instance;
	}
	
	public function run(){
	
		//load class dependecies
		spl_autoload_register(function($class){

			//load core files and database drivers
			if(file_exists(CORE.DS.ucfirst($class).EXT)){
				require_once(CORE.DS.ucfirst($class).EXT);
			}
			if(file_exists(CORE.DS.'database'.DS.ucfirst($class).EXT)){
				require_once(CORE.DS.'database'.DS.ucfirst($class).EXT);
			}
			if(file_exists(CORE.DS.'database'.DS.'drivers'.DS.ucfirst($class).EXT)){
				require_once(CORE.DS.'database'.DS.'drivers'.DS.ucfirst($class).EXT);
			}
			if(file_exists(CORE.DS.'database'.DS.'drivers'.DS.ucfirst($class).EXT)){
				require_once(CORE.DS.'database'.DS.'drivers'.DS.ucfirst($class).EXT);
			}

			// load models, views, controllers
			if(file_exists(APP_PATH.DS.'application'.DS.'models'.DS.$class.EXT)){
				require_once(APP_PATH.DS.'application'.DS.'models'.DS.$class.EXT);
			}
			if(file_exists(APP_PATH.DS.'application'.DS.'views'.DS.$class.EXT)){
				require_once(APP_PATH.DS.'application'.DS.'views'.DS.$class.EXT);
			}
			if(file_exists(APP_PATH.DS.'application'.DS.'controllers'.DS.$class.EXT)){
				require_once(APP_PATH.DS.'application'.DS.'controllers'.DS.$class.EXT);
			}
			
		});

		//execeute routing
		self::dispatch();
	}
	
	private function dispatch(){
		$error = '';
		$routes = $this->getRoutes();

		//check if controller class exists
		if(class_exists($routes['controller'])){	
		
			// set new controller
			$dispatch = new $routes['controller']($routes['model']);

			//check if method exist
			if(method_exists($dispatch, $routes['action'])){

				// set new controller
				$dispatch = new $routes['controller']($routes['model']);

				//execute controller and method
				if(method_exists($dispatch, $routes['action'])){
					call_user_func_array(array($dispatch, $routes['action']), $routes['parameters']);
				}

			}else{
				$error = new Error('404 Page not found.', 'Default page index is not defined.');
			}

		}else{
			$error = new Error('404 Page not found.', $routes['controller'] . ' class is not defined.');
		}
		
		// if there are errors, display them
		if($error){
			$error::show();
		}

	}
	
	private function getRoutes(){
		$uriArray = [];
		if(isset($_GET['url'])){
			$uriArray = explode('/', $_GET['url']);
		}

		if(!count($uriArray)){
			$controller = self::DEFAULT_CONTROLLER;
			$action = self::DEFAULT_ACTION;
			$model = self::DEFAULT_MODEL;
			$parameters = array();
		}else{
			$controller = ucfirst($uriArray[0]).'Controller';
			$action = (isset($uriArray[1])) ? $uriArray[1] : 'index';
			$model = ucfirst($uriArray[0]);
			$parameters = array();
		}
		
		return [
			'controller'=>$controller, 
			'action'	=>$action, 
			'model'		=>$model, 
			'parameters'=>$parameters
		];
	}
	
	
}