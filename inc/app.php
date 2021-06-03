<?php
class app extends router {
	private $view,$controller,$viewVars;
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
		return preg_replace_callback("/\{{(.*)\}}/", function($var){
			$nameObj = $var[1];
				if (preg_match("/(.*)\((.*)\)/",$nameObj,$var2)) {
					$nameObjFnc = $var2[1];
					if (method_exists($this->controller,$nameObjFnc))
						return $this->controller->$nameObjFnc($var2[2]);
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
						$this->viewVars[$var[2]] = $var[3];
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
							return $this->view->include($var[2]);
						break;
						case "setSection":
							return $this->viewVars[$var[2]];
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