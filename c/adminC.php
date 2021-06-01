<?php
class admin extends controller {
	function main($obj) {
		$this->model("db");
		if (!$this->checkLoginUse())
			$this->redirect("/login");
	}
}