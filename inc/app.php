<?php
class app extends router {
	private $controller;
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
		ob_start("app::obReplace");
		if ($arrPage['callback'])
			echo call_user_func_array($arrPage['callback'],(is_string($arrPage['callback']) ? $arrPage['params'] : array($this->controller)));
		ob_end_flush();	
	}
	function __destruct() {
		$this->disconnectDB();
	}
	function obReplace($buffer) {
		$test = array("test"=>"123");
		$buffer = preg_replace_callback("/\{(.*)\}/", function($var){
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
		return $buffer;
	}
}