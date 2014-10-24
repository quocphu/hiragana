<?php
require_once 'dao/BaseDao.php';
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
		$rs = $this->db->selectObject($sql,"Pattern");
		return $rs;
	}
	
	/**
	 * Get Pattern by id
	 * @param int $id
	 * @return Pattern
	 */
	public function getById($id){
		$sql = $this->getSql(__FUNCTION__);
		$pattern = $this->db->selectOneObject($sql, "Pattern", array("id"=>$id));
		return $pattern;
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
	
	/**
	 * Count search result
	 * @param String $title
	 * @return number
	 */
	public function searchCount($title){
		$sql = $this->getSql(__FUNCTION__);
		$rs = $this->db->selectScalar($sql, array("title"=>$title));
		return $rs;
	}
	
	/**
	 * Search by title and tab
	 * @param String $title Search data
	 * @param Number $limit
	 * @param Number $offset
	 * @return Array PatternSearchEntity
	 */
	public function search($title, $limit, $offset, $orderby, $order="asc"){
		$sql = $this->getSql(__FUNCTION__);
		
		$rs = $this->db->selectObject($sql, "PatternSearchEntity", array("title"=>$title, "limit"=>$limit, "offset"=>$offset, "orderby"=>$orderby, "order"=>$order));
		return $rs;
	}
}
?>