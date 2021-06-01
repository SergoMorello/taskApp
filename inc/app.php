<?php
class app extends router {
	function __construct() {
		$this->connectDB();
		$this->view = new view;
		$this->addControllers();
		$arrPage = $this->getPage();
		if (!$arrPage)
			view::error("Page not found",404);
		$controller = (object)array();
		if (file_exists(core::$dirC.$arrPage['page']."C.php")) {
			$controller = new $arrPage['page'](array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
			$this->view->setController($controller);
			if (method_exists($controller,"main"))
				$controller->main(array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
		}
		if ($arrPage['callback'])
			echo call_user_func_array($arrPage['callback'],(is_string($arrPage['callback']) ? $arrPage['params'] : array($controller)));
		
	}
	function __destruct() {
		$this->disconnectDB();
	}
}