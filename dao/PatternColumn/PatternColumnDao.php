<?php
class PatternColumnDao extends BaseDao {
	public function __construct($db){
		parent::__construct($db);
	}
	
	/**
	 * Get all PatternColumn
	 * @return array
	 */
	public function getAll() {
		$sql = $this->getSql(__FUNCTION__);
		$rs = $this->db->selectObject($sql,"PatternColumn");
		return $rs;
	}
	/**
	 * Get all PatternColumn
	 * @return array
	 */
	public function getByPatternId($patternId) {
		$sql = $this->getSql(__FUNCTION__);
		$rs = $this->db->selectObject($sql,"PatternColumn", array("patternid"=>$patternId));
		return $rs;
	}
	/**
	 * Get PatternColumn by id
	 * @param int $id
	 * @return PatternColumn
	 */
	public function getById($id){
		$sql = $this->getSql(__FUNCTION__);
		$patternColumn = $this->db->selectOneObject($sql, "PatternColumn", array("id"=>$id));
		return $patternColumn;
	}
	
	/**
	 * Insert
	 * @param PatternColumn $patternColumn
	 * @return int auto_id
	 */
	public function insert($patternColumn) {
		$sql = $this->getSql(__FUNCTION__);
		$id =  $this->db->insertAndGetLastId($sql, $patternColumn);
		return $id;
	}
	
	/**
	 * Update PatternColumn
	 * @param PatternColumn $patternColumn
	 * @return row effected
	 */
	public  function update($patternColumn){
		$sql = $this->getSql(__FUNCTION__);
		return $this->db->update($sql, $patternColumn);
	}
}
?>