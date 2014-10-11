php-mvc
=======

Jhanxtreme's simple PHP Framework

Usage
=====

<?php 

class Song extends BaseControllers{
	public function index(){

		//loading a Model
		$this->loadModel('Songs');

		//get Model data
		$data = $this->Songs->getSongs();

		// Show HTML format
		View::renderHTML('songs/songs', $data);
	}
}


