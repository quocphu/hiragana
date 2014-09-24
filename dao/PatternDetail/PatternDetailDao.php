<?php
class PatternDetailDao extends BaseDao {
	public function __construct($db){
		parent::__construct($db);
	}
	
	/**
	 * Get all pattern
	 * @return unknown
	 */
	public function getAll() {
		$sql = $this->getSql(__FUNCTION__);
		$rs = $this->db->selectObject($sql,"PatternDetail");
		return $rs;
	}
	
	/**
	 * Get Pattern by id
	 * @param int $id
	 * @return Pattern
	 */
	public function getById($id){
		$sql = $this->getSql(__FUNCTION__);
		$pattern = $this->db->selectOneObject($sql, "PatternDetail", array("id"=>$id));
		return $pattern;
	}
	
	public function getByPatternId($patternId) {
		$sql = $this->getSql(__FUNCTION__);
		$rs = $this->db->selectObject($sql,"PatternDetail", array("patternid"=>$patternId));
		return $rs;
	}
	/**
	 * Insert
	 * @param Pattern $pattern
	 * @return int auto_id
	 */
	public function insert($pattern) {
		$sql = $this->getSql(__FUNCTION__);
		$id =  $this->db->insertAndGetLastId($sql, $pattern);
		return $id;
	}
	
	/**
	 * Update pattern
	 * @param Pattern $pattern
	 * @return row effected
	 */
	public  function update($pattern){
		$sql = $this->getSql(__FUNCTION__);
		return $this->db->update($sql, $pattern);
	}
}
?>