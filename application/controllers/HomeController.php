<?php

class HomeController extends BaseController{

	public function index(){
		
		//loads library to get the registered pages and links
		$menus = $this->loadLibrary('RegisterPages');
	
		$data = array(
			'title'		=> 'Home',
			'content'	=> 'Welcome to the homepage.',
			'menu' 		=> $menus->getMenuLinks()
		);
		View::renderHTML('home/home', $data);
	}
}
