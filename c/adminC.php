<?php
class admin extends controller {
	function main($obj) {
		$this->useModel();
		if (!$this->checkLoginUse())
			$this->redirect("/login");
	}
}