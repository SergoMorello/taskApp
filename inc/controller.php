<?php
class controller extends core {
	protected $dataArr;
	public $main,$model;
	function __construct($obj) {
		$this->main = $obj;
		
	}
	function gen($page,$data=array()) {
		return new $page($data);
	}
	function useModel() {
		$this->model = new model;
	}
	function checkLoginUse() {
		if ($this->data()->cookie) {
			$arrLogin = explode(":",$this->data()->cookie['login']);
			return $this->model->selectRow("userlist","admin","id='".$arrLogin[0]."' AND login='".$arrLogin[1]."' AND pass='".$arrLogin[2]."'","",1)['admin'];
		}
	}
}