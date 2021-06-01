<?php
class formTaskWorker extends controller {
	function main($obj) {
		$this->model("db");
		$input = $this->input();
		$typeRequest = $obj['get']['type'];
		print_r($obj);
		if ($typeRequest=="add") {
			if (!$input->login || !$input->email || !$input->text) {
				$this->redirect("/newtask");
				return;
			}
			$id = $this->addTask($input->login,$input->email,$input->text);
			$this->redirect("/task/".$id);
		}
		if (!$this->model->checkLoginUse()) {
			$this->redirect("/login");
			return;
		}
		if ($typeRequest=="update") {
			$this->editTask($obj['get']['id'],$input->text,($input->stat ? 1 : 0));
			$this->redirect("/task/".$obj['get']['id']."/ok");
		}
	}
	private function addTask($login,$email,$text) {
		return $this->model->insert("tasklist",array("login"=>$login,"email"=>$email,"text"=>$text,"stat"=>0));
	}
	private function editTask($id,$text,$stat) {
		return $this->model->update("tasklist",array("text"=>$text,"stat"=>$stat),"id='".$id."'");
	}
}