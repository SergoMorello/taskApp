<?php
abstract class core {
	static $dblink,$dirM,$dirV,$dirC;
	function __construct() {
		self::$dirM = "m/";
		self::$dirV = "v/";
		self::$dirC = "c/";
	}
	function connectDB() {
		self::$dblink = new database();
		self::$dblink->connect();
	}
	function disconnectDB() {
		self::$dblink->disconnect();
	}
	public function getUrl() {
		$path = $this->data()->get['route'];
		return $path=="" ? "/" : "/".$path;
	}
	function redirect($page) {
		header("Location:".$page);
		die();
	}
	function data() {
		return (object)array("get"=>$_GET,"post"=>$_POST,"cookie"=>$_COOKIE);
	}
	function request() {
		return (object)$this->data()->get;
	}
	function input() {
		return (object)$this->data()->post;
	}
	function addCookie($arr) {
		if (is_array($arr))
			foreach($arr as $key=>$val) {
				$arrData = is_array($val) ? $val : array("value"=>$val,"date"=>(time()+(3600*24*30)));
				return setcookie($key, $arrData['value'], $arrData['date'], "/");
			}
	}
}