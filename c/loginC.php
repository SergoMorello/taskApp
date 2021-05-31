<?php
class login extends controller {
	public $get;
	function main($obj) {
		$this->useModel();
		$this->get = $obj['get'];
	}
}