<?php
class home extends controller {
	public $propRequest,$ofsppg,$numItems;
	function main($obj) {
		$this->model("db");
		$this->propRequest = (object)array("page"=>$this->props()->page,"name"=>$this->props()->name,"type"=>$this->props()->type);
		$this->ofsppg = 3;
		$this->test = 123;
	}
	public function getList() {
		$result = $this->model->listTask($this->propRequest,$this->ofsppg);
		$this->numItems = $result->num;
		return $result->list;
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