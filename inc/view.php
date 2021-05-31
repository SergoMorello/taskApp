<?php
class view extends core {
	private $dirV,$objData;
	protected $controller;
	function __construct() {
		$this->dirV = "v/";
	}
	function setController($controller) {
		$this->controller = $controller;
	}
	function include($page,$data=array()) {
		$objData = (object)array();
		if ($data)
			foreach($data as $key=>$dataIt) {
				${$key} = $dataIt;
			}
		if (file_exists($this->dirV.$page."V.php"))
			require_once($this->dirV.$page.'V.php');
		else
			echo "file view \"".$page."\" not found";
	}
	function show($page,$data=array()) {
		if ($data)
			foreach($data as $key=>$dataIt) {
				$this->objData->$key = $dataIt;
			}
		if (file_exists($this->dirV.$page."V.php"))
			require_once($this->dirV.$page.'V.php');
		else
			echo "file view \"".$page."\" not found";
		
	}
}