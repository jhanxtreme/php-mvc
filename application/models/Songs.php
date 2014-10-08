<?php

class Songs extends BaseModel{

	public function getSongs(){
		return $this->queryAll('songs');
	}

}