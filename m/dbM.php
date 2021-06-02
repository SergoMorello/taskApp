<?php
class db extends model {
	function __construct() {
		//
	}
	function checkLoginUse() {
		if ($this->cookie()) {
			$arrLogin = explode(":",$this->cookie()->login);
			return $this->selectRow("userlist","login,admin","id='".$arrLogin[0]."' AND login='".$arrLogin[1]."' AND pass='".$arrLogin[2]."'","",1);
		}
	}
}