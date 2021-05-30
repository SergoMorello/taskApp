<?php
class login extends controller {
	public $get;
	function __construct($obj) {
		$this->useModel();
		$this->get = $obj['get'];
	}
}