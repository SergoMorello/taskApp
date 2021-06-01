<?php
class formTaskWorker extends controller {
	function main($obj) {
		$this->model("db");
		$post = $obj['post'];
		$typeRequest = $obj['get']['type'];
		
		
		if ($typeRequest=="add") {
			if (!$post['login'] || !$post['email'] || !$post['text']) {
				$this->redirect("/newtask");
				return;
			}
			$id = $this->addTask($post['login'],$post['email'],$post['text']);
			$this->redirect("/task/".$id);
		}
		if (!$this->checkLoginUse()) {
			$this->redirect("/login");
			return;
		}
		if ($typeRequest=="update") {
			$this->editTask($obj['get']['id'],$post['text'],($post['stat'] ? 1 : 0));
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