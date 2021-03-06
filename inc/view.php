<?php
class view extends core {
	private $controller;
	static $staticController;
	function setController($controller) {
		self::$staticController = $controller;
	}
	private function controller() {
		return self::$staticController;
	}
	private function addView($view,$data=array()) {
		if (file_exists(self::$dirV.$view."V.php")) {
			if ($data)
				foreach($data as $key=>$dataIt)
					${$key} = $dataIt;
			$this->controller = $this->controller();
			require_once(self::$dirV.$view.'V.php');
		}else
			view::error("View \"".$view."\" not found");
	}
	function include($page,$data=array()) {
		$this->addView($page,$data);
	}
	static function show($page="",$data=array()) {
		if (!$page)
			view::error("Name page, no use");
		$view = new view;
		$view->addView($page,$data);
	}
	static function error($message,$code=500) {
		header($_SERVER['SERVER_PROTOCOL']." ".$code);
		echo $message;
		die();
	}
}