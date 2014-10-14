php-mvc
=======

Jhanxtreme's simple PHP Framework

Usage
=====





<?php

 
class HomeController extends BaseController{

	function __construct(){
		//load songs
		$this->loadModel('Songs');
		//load gallery
		$this->loadLibrary('Gallery');
	}

	public function index(){

		//get Model data
		$data = [
			songs 	=> $this->Songs->getSongs(),
			gallery	=> $this->Gallery->getImages();
		];

		// Show HTML format
		View::renderHTML('default/default', $data);
	}

}
