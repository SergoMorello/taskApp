<?php
class controller extends core {
	protected $model;
	function model($model) {
		if (file_exists(self::$dirM.$model."M.php")) {
			require_once(self::$dirM.$model.'M.php');
			$this->model = new $model;
		}else
			view::error("Model \"".$model."\" not found");
	}
	function url(...$params) {
		$name = $params[0];
		if (!$name)
			return;
		$url = self::$pagesArr[$name]['url'];
		unset($params[0]);
		$pat = array();
		$rep = array();
		foreach($params as $key=>$param)
			$rep[] = $param;
		return preg_replace_callback("/{(.*)}/U", function() use (&$rep) {
			return array_shift($rep);
		},$url);
	}
}