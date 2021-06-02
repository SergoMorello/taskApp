<?php
class task extends controller {
	private $obj;
	public $type;
	function main($obj) {
		$this->model("db");
		$this->checkLogin = $this->model->checkLoginUse();
		$this->obj = $obj;
		$this->type = $this->props()->type;
	}
	public function getTask() {
		return $this->model->getTask($this->props()->id);
	}
}