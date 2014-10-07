<?php


class Gallery{

	private static $_instance;

	public function getImages($dir){
		$images = [];
		
		// if directory or file exists
		if(!is_dir($dir) || !file_exists($dir)){
			die('No such file or directory: ' . $dir);
		}
		
		$img_patterns = '/jpeg|png|gif|jpg|bmp|svg|tiff/';
	
		//retrieve files
		$dh = opendir($dir);
		while( false !== ($filename = readdir($dh)) ){
			preg_match($img_patterns, $filename, $match, PREG_OFFSET_CAPTURE);
			if(! is_dir($dir.DS.$filename) && $match){
				$images[] = $filename;
			}
		}
		return $images;
		

	}



}