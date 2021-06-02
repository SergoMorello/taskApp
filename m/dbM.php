<?php
class db extends model {
	function __construct() {
		//
	}
	//login
	function checkLogin($login,$pass) {
		return $this->selectRow("userlist","id","login='".$login."' AND pass='".$pass."'","",1)['id'];
	}
	function checkLoginUse() {
		if ($this->cookie()) {
			$arrLogin = explode(":",$this->cookie()->login);
			return $this->selectRow("userlist","login,admin","id='".$arrLogin[0]."' AND login='".$arrLogin[1]."' AND pass='".$arrLogin[2]."'","",1);
		}
	}
	function setLogin($id,$login,$pass) {
		return $this->addCookie(array("login"=>$id.":".$login.":".$pass));
	}
	function clearLogin() {
		return $this->addCookie(array("login"=>""));
	}
	//Task
	function addTask($login,$email,$text) {
		return $this->insert("tasklist",array("login"=>$login,"email"=>$email,"text"=>$text,"stat"=>0));
	}
	function editTask($id,$text,$stat) {
		return $this->update("tasklist",array("text"=>$text,"stat"=>$stat),"id='".$id."'");
	}
	function getTask($id) {
		return $this->selectRow("tasklist","*","id=".$id);
	}
	function listTask($propRequest,$ofsppg) {
		$page = $propRequest->page ? $propRequest->page : 1;
		$name = "login";
		$type = $propRequest->type ? "ASC" : "DESC";
		switch($propRequest->name) {
			case 1:
				$name = "email";
			break;
			case 2:
				$name = "stat";
			break;
			default:
				$name = "login";
		}
		return (object)array("list"=>$this->selectList("tasklist","*","",$name." ".$type,(($page*$ofsppg)-$ofsppg).",".$ofsppg),"num"=>$this->getNum("tasklist","*","",$name." ".$type));
	}
}