<?php
class task extends controller {
	private $obj;
	function __construct($obj) {
		$this->useModel();
		$this->obj = $obj;
	}
	public function getTask() {
		return $this->model->selectRow("tasklist","*","id=".$this->obj['get']['id']);
	}
}