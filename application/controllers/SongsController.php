<?php

class SongsController extends BaseController{

	public function index(){

		$this->loadModel('Songs');
		$songs = $this->Songs->getSongs();

		//loads library to get the registered pages and links
		$this->loadLibrary('RegisterPages');
	
		$data = array(
			'title'		=> 'Songs',
			'menu' 		=> $this->RegisterPages->getMenuLinks(),
			'songs'	=> $songs,
			
		);
		View::renderHTML('songs/songs', $data);
	}
}
