<?php
class home extends controller {
	public $propRequest,$ofsppg,$numItems;
	function main($obj) {
		$this->model("db");
		$this->propRequest = (object)array("page"=>$obj['get']['page'],"name"=>$obj['get']['name'],"type"=>$obj['get']['type']);
		$this->ofsppg = 3;
	}
	public function getList() {
		$page = $this->propRequest->page ? $this->propRequest->page : 1;
		$name = "login";
		$type = $this->propRequest->type ? "ASC" : "DESC";
		switch($this->propRequest->name) {
			case 1:
				$name = "email";
			break;
			case 2:
				$name = "stat";
			break;
			default:
				$name = "login";
		}
		$result = $this->model->selectList("tasklist","*","",$name." ".$type,(($page*$this->ofsppg)-$this->ofsppg).",".$this->ofsppg);
		$this->numItems = $this->model->getNum("tasklist","*","",$name." ".$type);
		
		return $result;
	}
	public function statName($val) {
		return $val ? "Выполнено" : "Не выполнено";
	}
	public function listPages() {
		$pages = ceil($this->numItems/$this->ofsppg);
		$page = $this->propRequest->page ? $this->propRequest->page : 1;
		$arrPages = array();
		$pagination = 3;
		if ($pages>1) {
			$last_count = 0;
			$past_count = 1;
			if ($page>$pagination) {
				$past_count = ($page-$pagination+1);
				$arrPages["pagination"]['past'] = $past_count;
			}
			for ($pgs=$past_count;$pgs<=$pages;$pgs++) {
				$arrPages["pages"][] = array("name"=>$pgs,"select"=>($page==$pgs ? true : false));

				if ($page<=$pgs)
					++$last_count;
				
				if ($last_count>=$pagination) {
					$arrPages["pagination"]['last'] = $pgs;
					break;
				}
			}
			return $arrPages;
		}
	}
}