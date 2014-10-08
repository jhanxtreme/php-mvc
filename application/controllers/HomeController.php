<?php

class HomeController extends BaseController{

	public function index(){

		//loads library to get the registered pages and links
		$this->loadLibrary('RegisterPages');
	
		$data = array(
			'title'		=> 'Welcome',
			'content'	=> 'This is the Jhan Mateo simple PHP Framework - BETA',
			'menu' 		=> $this->RegisterPages->getMenuLinks()
		);
		View::renderHTML('home/home', $data);
	}
}
