<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

interface iView{
	public static function renderHTML($name, $data);
}

class View implements iView{

	public static function renderHTML($name, $data){
		$dir = explode("/",	 $name);
		extract($data);
		try{
			if(file_exists(APP_PATH.DS.'application'.DS.'views'.DS.$dir[0].DS.$dir[1].'.tpl'.EXT)){
				require_once(APP_PATH.DS.'application'.DS.'views'.DS.$dir[0].DS.$dir[1].'.tpl'.EXT);
			}else{
				require_once(APP_PATH.DS.'application'.DS.'views'.DS.'default'.DS.'default.tpl'.EXT);
			}
		}catch(Exception $e){
			die('File template not found: ' . $name);
		}
		
	}
}
