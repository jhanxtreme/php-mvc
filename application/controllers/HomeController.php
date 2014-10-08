<?php

class HomeController extends BaseController{

	public function index(){
		
		//loads library to get the registered pages and links
		$menus = $this->loadLibrary('RegisterPages');
	
		$data = array(
			'title'		=> 'Welcome',
			'content'	=> 'This is the Jhan Mateo simple PHP Framework - BETA',
			'menu' 		=> $menus->getMenuLinks()
		);
		View::renderHTML('home/home', $data);
	}
}
