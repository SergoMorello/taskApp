<?php
class login extends controller {
	public $get;
	function main($obj) {
		$this->model("db");
		$this->get = $obj['get'];
	}
}