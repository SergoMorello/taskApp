<?php
class formLoginWorker extends controller {
	function main($obj) {
		$this->useModel();
		$post = $obj['post'];
		$login = $post['login'];
		$pass = md5($post['password']);
		
		if ($obj['get']['type']=="submit")
			if ($id = $this->checkLogin($login,$pass)) {
				if ($this->setLogin($id,$login,$pass))
					$this->redirect("/");
			}else
				$this->redirect("/login/error");
		if ($obj['get']['type']=="logout") {
			$this->clearLogin();
			$this->redirect("/login");
		}
	}
	function checkLogin($login,$pass) {
		return $this->model->selectRow("userlist","id","login='".$login."' AND pass='".$pass."'","",1)['id'];
	}
	function setLogin($id,$login,$pass) {
		return $this->addCookie(array("login"=>$id.":".$login.":".$pass));
	}
	function clearLogin() {
		return $this->addCookie(array("login"=>""));
	}
}