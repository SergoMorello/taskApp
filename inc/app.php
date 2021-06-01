<?php
class app {
	static function run() {
		$router = new router;
		$router->connectDB();
		$router->view = new view;
		$router->addControllers();
		$arrPage = $router->getPage();
		$controller = (object)array();
		if (file_exists(core::$dirC.$arrPage['page']."C.php")) {
			$controller = new $arrPage['page'](array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
			$router->view->setController($controller);
			if (method_exists($controller,"main"))
				$controller->main(array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
		}
		if ($arrPage['callback'])
			echo call_user_func_array($arrPage['callback'],(is_string($arrPage['callback']) ? $arrPage['params'] : array($controller)));
		$router->disconnectDB();
	}
}