<?php
class controller extends core {
	protected $model;
	
	function gen($page,$data=array()) {
		return new $page($data);
	}
	function useModel() {
		$this->model = new model;
	}
	function model($model) {
		if (file_exists(self::$dirM.$model."M.php")) {
			require_once(self::$dirM.$model.'M.php');
			$this->model = new $model;
		}
	}
	function checkLoginUse() {
		if ($this->data()->cookie) {
			$arrLogin = explode(":",$this->data()->cookie['login']);
			return $this->model->selectRow("userlist","admin","id='".$arrLogin[0]."' AND login='".$arrLogin[1]."' AND pass='".$arrLogin[2]."'","",1)['admin'];
		}
	}
}