<?php
class model extends core {
	public function insert($table,$params) {
		if (is_array($params))
			if ($id=self::$dblink->query("INSERT INTO ".$table." (id,".implode(",",array_keys($params)).") VALUES (NULL,'".implode("','",$params)."')",true))
				return $id;
		return false;		
	}
	public function update($table,$params,$where) {
		if (is_array($params)) {
			$arrQuery = array();
			foreach($params as $key=>$value)
				$arrQuery[] = $key."='".$value."'";
			if (self::$dblink->query("UPDATE ".$table." SET ".implode(",",$arrQuery)." WHERE ".$where))
				return true;
		}
		return false;
	}
	public function delete($table,$where) {
		if (self::$dblink->query("DELETE FROM ".$table." WHERE ".$where))
			return true;
		return false;
	}
	public function selectRow($table,$select,$where="",$order="",$limit="") {
		if ($result=self::$dblink->get_row("SELECT ".$select." FROM ".$table.($where ? " WHERE ".$where : "").($order ? " ORDER BY ".$order : "").($limit ? " LIMIT ".$limit : "")))
			return $result;
		return false;
	}
	public function selectList($table,$select,$where="",$order="",$limit="") {
		if ($result=self::$dblink->get_list("SELECT ".$select." FROM ".$table.($where ? " WHERE ".$where : "").($order ? " ORDER BY ".$order : "").($limit ? " LIMIT ".$limit : "")))
			return $result;
		return false;
	}
	public function getNum($table,$select,$where="",$order="",$limit="") {
		if ($result=self::$dblink->get_num("SELECT ".$select." FROM ".$table.($where ? " WHERE ".$where : "").($order ? " ORDER BY ".$order : "").($limit ? " LIMIT ".$limit : "")))
			return $result;
		return false;
	}
}