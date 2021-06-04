<?php
class formLoginWorker extends controller {
	function main($obj) {
		$this->model("db");
		$props = $this->props();
		$input = $this->input();
		$login = $input->login;
		$pass = md5($input->password);
		if ($props->type=="submit")
			if ($id = $this->model->checkLogin($login,$pass)) {
				if ($this->model->setLogin($id,$login,$pass))
					$this->redirect($this->url("home"));
			}else
				$this->redirect($this->url("login","error"));
		else
		if ($props->type=="logout") {
			$this->model->clearLogin();
			$this->redirect($this->url("login"));
		}
		else
			$this->redirect($this->url("login"));
	}
}