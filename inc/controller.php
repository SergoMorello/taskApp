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
}