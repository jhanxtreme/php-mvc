<?php

class Error extends BaseController{

	private static $_text1;
	private static $_text2;
	private static $_pages;

	function __construct($text1, $text2 = ""){
		self::$_text1 = $text1;
		self::$_text2 = (strlen($text2) > 0) ? $text2 : 'Sorry. The page you\'re trying to access cannot be found.';
	}
	
	public static function show(){
		$data = array(
			'title' 	=> self::$_text1,
			'content' 	=> self::$_text2,
			'menu' 		=> self::$_pages
		);
		View::renderHTML('error/error', $data);
	}

}