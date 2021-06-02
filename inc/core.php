<?php
abstract class core {
	static $pagesArr=array(),$pageSelect,$dblink,$dirM,$dirV,$dirC;
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
		$path = $this->data()->get->route;
		return $path=="" ? "/" : "/".$path;
	}
	function getPages() {
		return self::$pagesArr;
	}
	function redirect($page) {
		header("Location:".$page);
		die();
	}
	private function data() {
		return (object)array("get"=>(object)$_GET,"post"=>(object)((self::$pageSelect['method']=="post") ? $_POST : array()),"cookie"=>(object)$_COOKIE);
	}
	function request() {
		return $this->data()->get;
	}
	function input() {
			return $this->data()->post;
	}
	function cookie() {
		return $this->data()->cookie;
	}
	function addCookie($arr) {
		if (is_array($arr))
			foreach($arr as $key=>$val) {
				$arrData = is_array($val) ? $val : array("value"=>$val,"date"=>(time()+(3600*24*30)));
				return setcookie($key, $arrData['value'], $arrData['date'], "/");
			}
	}
	function addControllers() { 
		foreach($this->getPages() as $page)
			if (file_exists(self::$dirC.$page['page']."C.php"))
				require_once(self::$dirC.$page['page'].'C.php');
	}
	function getPage() {
		$pages = $this->getPages();
		if ($pages)
			foreach($pages as $page) {
				$arrUrlItems = explode("/",$this->getUrl());
				if (preg_match_all("/\{(.*)\}/U", $page['url'], $match)) {
					$arrPageItems = explode("/",$page['url']);
					$numSec = count($arrUrlItems);
					$trueSec = 0;
					$dataSec = array();
					foreach($arrUrlItems as $key=>$urlItems) {
						if ($urlItems==$arrPageItems[$key])
							++$trueSec;
						foreach($match[1] as $var) {
							if ("{".$var."}"==$arrPageItems[$key]) {
								++$trueSec;
								$dataSec[$var] = $urlItems;
							}
						}
					}
					if ($numSec==$trueSec) {
						$page['get'] = $dataSec;
						return self::$pageSelect = $page;
					}
				}
				if ($this->getUrl()==$page['url'])
					return self::$pageSelect = $page;
			}
		return array();
	}
}