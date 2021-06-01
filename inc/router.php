<?php
class router extends core {
	private $pagesArr;
	public $protected;
	function __construct() {
		parent::__construct();
		$this->connectDB();
		$this->view = new view;
		$this->pagesArr = array();
	}
	function __destruct() {
		$this->disconnectDB();
	}
	public function get($url,$page,$callback="") {
		array_push($this->pagesArr,array("url"=>$url,"page"=>$page,"method"=>"get","callback"=>$callback));
	}
	public function post($url,$page,$callback="") {
		array_push($this->pagesArr,array("url"=>$url,"page"=>$page,"method"=>"post","post"=>$this->data()->post,"callback"=>$callback));
	}
	function getPages() {
		return $this->pagesArr;
	}
	private function addControllers() { 
		foreach($this->getPages() as $page)
			if (file_exists(self::$dirC.$page['page']."C.php"))
				require_once(self::$dirC.$page['page'].'C.php');
	}
	function run() {
		$this->addControllers();
		$arrPage = $this->getPage();
		if (file_exists(self::$dirC.$arrPage['page']."C.php")) {
			$controller = new $arrPage['page'](array("url"=>$page['url'],"post"=>$page['post'],"get"=>$page['get']));
			$this->view->setController($controller);
			if (method_exists($controller,"main"))
				$controller->main(array("url"=>$arrPage['url'],"post"=>$arrPage['post'],"get"=>$arrPage['get']));
		}
		if ($arrPage['callback']) {
			$callbackType = is_string($arrPage['callback']) ? array($this,$arrPage['callback']) : $arrPage['callback'];
			echo call_user_func_array($callbackType,array($this));
		}
	}
	private function getPage() {
		$pages = $this->getPages();
		if ($pages)
			foreach($pages as $page) {
				$arrUrlItems = explode("/",$this->getUrl());
				if (preg_match_all("/\{(.*)\}/U", $page['url'], $match)) {
					$arrPageItems = explode("/",$page['url']);
					$numSec = count($arrUrlItems);
					$trueSec = 0;
					$dataSec = array();
					foreach($arrUrlItems as $key=>$urlItems) {
						if ($urlItems==$arrPageItems[$key])
							++$trueSec;
						foreach($match[1] as $var) {
							if ("{".$var."}"==$arrPageItems[$key]) {
								++$trueSec;
								$dataSec[$var] = $urlItems;
							}
						}
					}
					if ($numSec==$trueSec) {
						$page['get'] = $dataSec;
						return $page;
					}
				}
				if ($this->getUrl()==$page['url'])
					return $page;
			}
		return array();
	}
}