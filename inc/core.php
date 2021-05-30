<?php
class core {
	protected $data,$dirC;
	function __construct() {
		$this->dirC = "c/";	
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