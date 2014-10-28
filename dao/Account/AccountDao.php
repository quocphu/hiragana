<?php 
require_once 'dao/BaseDao.php';
class AccountDao extends BaseDao {
	public function __construct($db){
		parent::__construct($db);
	}
	
	
	/**
	 * Get Pattern by id
	 * @param int $id
	 * @return Pattern
	 */
	public function getById($id){
		$sql = $this->getSql(__FUNCTION__);
		$account = $this->db->selectOneObject($sql, "Account", array("id"=>$id));
		return $account;
	}
	
	/**
	 * Get Pattern by face book id
	 * @param String $fbId
	 * @return Pattern
	 */
	public function getByFbId($fbId){
		$sql = $this->getSql(__FUNCTION__);
		$account = $this->db->selectOneObject($sql, "Account", array("fbId"=>$fbId));
		return $account;
	}
	
	/**
	 * Insert
	 * @param Account $account
	 * @return int auto_id
	 */
	public function insert($account) {
		$sql = $this->getSql(__FUNCTION__);
		$id =  $this->db->insertAndGetLastId($sql, $account);
		return $id;
	}
	
// 	/**
// 	 * Update pattern
// 	 * @param Pattern $account
// 	 * @return row effected
// 	 */
// 	public  function update($account){
// 		$sql = $this->getSql(__FUNCTION__);
// 		return $this->db->update($sql, $account);
// 	}
	
}
	
?>