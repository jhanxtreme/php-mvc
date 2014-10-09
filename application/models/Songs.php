<?php if(! defined('BASE_PATH')) die('Direct access not allowed. Contact jhanxtreme@gmail.com.');

class Songs extends BaseModel{

	public function getSongs(){
		return $this->queryAll('songs');
	}

}