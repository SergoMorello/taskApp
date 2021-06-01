<?php
class task extends controller {
	private $obj;
	public $type;
	function main($obj) {
		$this->model("db");
		$this->checkLogin = $this->model->checkLoginUse();
		$this->obj = $obj;
		$this->type = $obj['get']['type'];
	}
	public function getTask() {
		return $this->model->selectRow("tasklist","*","id=".$this->obj['get']['id']);
	}
}