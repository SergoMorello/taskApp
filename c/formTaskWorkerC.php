<?php
class formTaskWorker extends controller {
	function main($obj) {
		$this->model("db");
		$input = $this->input();
		$typeRequest = $this->props()->type;
		if ($typeRequest=="add") {
			if (!$input->login || !$input->email || !$input->text) {
				$this->redirect("/newtask");
				return;
			}
			$id = $this->model->addTask($input->login,$input->email,$input->text);
			$this->redirect("/task/".$id);
		}
		if (!$this->model->checkLoginUse()) {
			$this->redirect("/login");
			return;
		}
		if ($typeRequest=="update") {
			$id = $this->props()->id;
			$this->model->editTask($id,$input->text,($input->stat ? 1 : 0));
			$this->redirect("/task/".$id."/ok");
		}
	}
}