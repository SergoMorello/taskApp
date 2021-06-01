<?php
class view extends core {
	private $objData;
	protected $controller;
	function setController($controller) {
		$this->controller = $controller;
	}
	private function addView($view,$data=array()) {
		if (file_exists(self::$dirV.$view."V.php")) {
			if ($data)
				foreach($data as $key=>$dataIt)
					${$key} = $dataIt;
			require_once(self::$dirV.$view.'V.php');
		}else
			echo "file view \"".$view."\" not found";
	}
	function include($page,$data=array()) {
		$this->addView($page,$data);
	}
	function show($page,$data=array()) {
		$this->addView($page,$data);
		
	}
}