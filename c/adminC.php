<?php
class admin extends controller {
	function __construct($obj) {
		$this->useModel();
		if (!$this->checkLoginUse())
			$this->redirect("/login");
	}
}