<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

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

	public function get(){
		header('Content-type: application/json');
		echo json_encode($this->Songs->getSongs());
	}
}
