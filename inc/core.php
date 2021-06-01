<?php
abstract class core {
	protected $data;
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
		return $_GET['route']=="" ? "/" : "/".$_GET['route'];
	}
	function redirect($page) {
		header("Location:".$page);
		die();
	}
	function data() {
		return (object)array("get"=>$_GET,"post"=>$_POST,"cookie"=>$_COOKIE);
	}
	function addCookie($arr) {
		if (is_array($arr))
			foreach($arr as $key=>$val) {
				$arrData = is_array($val) ? $val : array("value"=>$val,"date"=>(time()+(3600*24*30)));
				return setcookie($key, $arrData['value'], $arrData['date'], "/");
			}
	}
	
}