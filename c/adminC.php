<?php
class admin extends controller {
	function main($obj) {
		$this->model("db");
		if (!$this->model->checkLoginUse())
			$this->redirect("/login");
	}
}