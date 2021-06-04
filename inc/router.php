<?php
class router extends core {
	static $pageId;
	private function create($params) {
		self::$pageId = array_push(core::$pagesArr,$params)-1;
	}
	public static function get($url,$page,$callback="",$params=array()) {
		$obj = new router();
		$obj->create(array("url"=>$url,"page"=>$page,"method"=>"get","callback"=>$callback,"params"=>$params));
		return $obj;
	}
	public static function post($url,$page,$callback="",$params=array()) {
		$obj = new router();
		$obj->create(array("url"=>$url,"page"=>$page,"method"=>"post","callback"=>$callback,"params"=>$params));
		return $obj;
	}
	function name($name) {
		core::$pagesArr[$name] = core::$pagesArr[self::$pageId];
		unset(core::$pagesArr[self::$pageId]);
	}
}