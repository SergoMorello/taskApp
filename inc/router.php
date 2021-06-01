<?php
class router extends core {
	function __construct() {
		parent::__construct();
	}
	public static function get($url,$page,$callback="",$params=array()) {
		array_push(core::$pagesArr,array("url"=>$url,"page"=>$page,"method"=>"get","callback"=>$callback,"params"=>$params));
	}
	public static function post($url,$page,$callback="",$params=array()) {
		array_push(core::$pagesArr,array("url"=>$url,"page"=>$page,"method"=>"post","callback"=>$callback,"params"=>$params));
	}
}