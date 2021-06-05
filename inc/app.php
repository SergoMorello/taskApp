<?php
class app extends router {
	private $view,$controller,$viewVars,$viewSection;
	function __construct() {
		$this->connectDB();
		$this->view = new view;
		$this->addControllers();
		$arrPage = $this->getPage();
		
		if (!$arrPage)
			view::error("Page not found",404);
		$this->controller = (object)array();
		if (file_exists(core::$dirC.$arrPage['page']."C.php")) {
			$this->controller = new $arrPage['page'](array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
			$this->view->setController($this->controller);
			if (method_exists($this->controller,"main"))
				$this->controller->main(array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
		}
		
		if ($arrPage['callback'])
			echo $this->obReplace(call_user_func_array($arrPage['callback'],(is_string($arrPage['callback']) ? $arrPage['params'] : array($this->controller))));
	}
	function __destruct() {
		$this->disconnectDB();
	}
	private function viewVar($buffer) {
		return preg_replace_callback("/{{(.*)}}/", function($var){
			if ($this->viewVars)
				foreach($this->viewVars as $viewVarName=>$viewVarVal)
					${$viewVarName} = $viewVarVal;
					
			$nameObj = $var[1];
			
			if (isset(${$nameObj}))
				return ${$nameObj};
			
			if (preg_match("/([\S|^=]{1,})[^a-z0-9]{0,}\=[\s|\S]([\"|']{1,})(.*)\\2|([\S|^=]{1,})[^a-z0-9]{0,}\=[^a-z0-9]{0,}([^()\s]{1,})[\s]/",$nameObj,$var2)) {
				if ($var2[3])
					$this->viewVars[$var2[1]] = $var2[3];
				if ($var2[5]) {
					if (isset(${$var2[5]}))
						$this->viewVars[$var2[4]] = ${$var2[5]};
				}
				return;
			}
			if (preg_match("/([\S|^=]{1,})[^a-z0-9]{0,}\=[^a-z0-9]{0,}([^=|\s]{1,})\((.*)\)|([^=\s]{1,})\((.*)\)/",$nameObj,$var2)) {
				
				if ($var2[4]) {
					$nameObjFnc = $var2[4];
					if (method_exists($this->controller,$nameObjFnc))
						return $this->controller->$nameObjFnc(...explode(",",preg_replace("/[\'|\"]/","",$var2[5])));
				}
				if ($var2[1]) {
					$nameObjFnc = $var2[2];
					if (method_exists($this->controller,$nameObjFnc)) {
						$this->viewVars[$var2[1]] = $this->controller->$nameObjFnc(...explode(",",preg_replace("/[\'|\"]/","",$var2[3])));
						$this->viewVars[$var2[1]] = $this->viewVars[$var2[1]] ? $this->viewVars[$var2[1]] : "";
						return;
					}
				}
			}
			if (property_exists($this->controller,$nameObj))
				return $this->controller->$nameObj;
			return $var[0];
		}, $buffer);
	}
	
	private function viewFncDouble($buffer) {
		return preg_replace_callback("/\@([a-z0-9]{1,})\([\'|\"]([a-z0-9]{1,})[\'|\"]\)(.*)\@end\\1/isU", function($var){
			if ($var[1] AND $var[2]) {
				switch($var[1]) {
					case "section":
						$this->viewSection[$var[2]] = $var[3];
					break;
				}
			}
		},$buffer);
	}
	private function viewFncSingle($buffer) {
		return preg_replace_callback("/\@([a-z0-9]{1,})\([\'|\"]([a-z0-9]{1,})[\'|\"]\)/siU", function($var){
				if ($var[1] AND $var[2]) {
					switch($var[1]) {
						case "extends":
							return $this->obReplace($this->view->include($var[2]));
						break;
						case "include":
							return $this->viewVar($this->view->include($var[2]));
						break;
						case "setSection":
							return $this->viewSection[$var[2]];
						break;
					}
				}
		},$buffer);
	}
	function obReplace($buffer) {
		$buffer = $this->viewVar($buffer);
		$buffer = $this->viewFncDouble($buffer);
		$buffer = $this->viewFncSingle($buffer);
		return $buffer;
	}
}