<?php
class PatternDao extends BaseDao {
	public function __construct($db){
		parent::__construct($db);
	}
	
	/**
	 * Get all pattern
	 * @return unknown
	 */
	public function getAll() {
		$sql = $this->db->readTextFile($this->basePath."_getAll.sql");
		$rs = $this->db->select($sql,"Pattern");
		return $rs;
	}
	
	public function insert($pattern) {
		$sql = $this->db->readTextFile($this->basePath."_insert.sql");
		$id =  $this->db->insertAndGetLastId($sql, $pattern);
		return $id;
	}
}
?>