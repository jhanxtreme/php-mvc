<?php
//test program

class xRoute{


	public static function set($name, $callback){


	}

}

class xView{
	public static function render($data){

	}
}

xRoute::set('home', function($result){
	View::render($result);
});