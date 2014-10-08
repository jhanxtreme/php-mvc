<?php

interface iView{
	public static function renderHTML($name, $data);
}

class View implements iView{

	public static function renderHTML($name, $data){
		extract($data);
		try{
			if(file_exists(APP_PATH.DS.'application'.DS.'views'.DS.$name.'.tpl'.EXT)){
				require_once(APP_PATH.DS.'application'.DS.'views'.DS.$name.'.tpl'.EXT);
			}else{
				require_once(APP_PATH.DS.'application'.DS.'views'.DS.'default'.DS.'default.tpl'.EXT);
			}
		}catch(Exception $e){
			die('File template not found: ' . $name);
		}
		
	}
}