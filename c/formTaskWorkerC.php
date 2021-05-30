<?php
class formTaskWorker extends controller {
	function __construct($obj) {
		$this->useModel();
		$post = $obj['post'];
		if (!$this->checkLoginUse()) {
			$this->redirect("/login");
			return;
		}
		if ($obj['url']=="/task/{id}/submit")
			$this->addTask($post['login'],$post['email'],$post['text']);
		if ($obj['url']=="/task/{id}/update") {
			$this->editTask($obj['get']['id'],$post['text'],($post['stat'] ? 1 : 0));
			$this->redirect("/task/".$obj['get']['id']);
		}
		//print_r($this->model->insert("tasklist",array("login"=>$post['login'],"email"=>$post['email'],"text"=>$post['text'],"stat"=>0)));
		//print_r($model->update("test",array("login"=>123,"email"=>"sergomorello@yandex.ru","text"=>"test"),"id=6"));
		//print_r($model->delete("test","id=7"));
		//print_r($model->selectRow("test","*","id=6"));
		//print_r($model->selectList("test","*","id=6"));
	}
	private function addTask($login,$email,$text) {
		return $this->model->insert("tasklist",array("login"=>$login,"email"=>$email,"text"=>$text,"stat"=>0));
	}
	private function editTask($id,$text,$stat) {
		return $this->model->update("tasklist",array("text"=>$text,"stat"=>$stat),"id='".$id."'");
	}
}