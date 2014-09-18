<?php
require_once("config.properties");
class DP {
	private  $db;
	private static $instant;
	
	/**
	 * Create instant
	 * @return DP
	 */
	public static function getInstant() {
		
		if(!isset(self::$instance) || self::$instant == null){
			self::$instant = new DP();
			self::$instant->db = new PDO ( 'mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASS );
			self::$instant->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instant->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		return self::$instant;
	}
	
	public function getDB(){
		print_r(isset($this->db));
		return $this->db;
	}
	private function mapper($row, $instance) {
		foreach ( $row as $property => $value ) {
			$instance->$property = $value;
		}
	}

	/**
	 * Select one object
	 * @param String $query String select query
	 * @param String $objectName Class name of object
	 * @return Object Instant of object
	 */
	public function selectOne($query,$objectName) {
		$stmt = $this->db->query ( $query );
	
		$object = new $objectName();
	
		while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
			$this->mapper($row, $object);
			break;
		}
		
		return $object;
	}
	
	/**
	 * Select list of object
	 * @param String $query String select query
	 * @param String $objectName Class name of object
	 * @return Array List of object
	 */
	public function select($query, $objectName) {
		$stmt = $this->db->query ( $query );
		$rs = array();
		
	
		while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
			$object = new $objectName();
			$this->mapper($row, $object);
			$rs[]=$object;
		}
	
		return $rs;
	}
	
	/**
	 * Execute query for update or insert
	 * @param String $query Query string
	 * @param Object $object Object to insert/update
	 */
	public function update($query, $object){
		$sql = $this->queryProcess($query, $object);
		//$stmt = $db->prepare($sql);
		
		$affected_rows = $this->db->exec($sql);
		return $affected_rows ;
	}
	
	private function queryProcess($sql, $object){
		$prop="";
		preg_match_all("/#[a-zA-Z0-9]+#/", $sql, $matches, PREG_SET_ORDER);

		foreach ($matches as $val) {
			$prop = str_replace("#","",$val[0]);
			$sql=str_replace($val[0], $object->$prop, $sql);
		}

		return $sql;
	}
	
	public  function readTextFile($path){
		$content = file_get_contents($path);
		return $content;
	}
	/**
	 * Insert and get LastID (for column auto increment)
	 * @param unknown $sql
	 * @param unknown $object
	 */
	public function insertAndGetLastId($sql, $object) {
		$this->update($sql, $object);
		return $this->db->lastInsertId();
	}
	
	public function insertAndGetLastId2($sql, $object) {
		$this->update($sql, $object);
		sleep(3);
		return $this->db->lastInsertId();
	}
	
	public function selectScalar($sql, $param){
		$stmt = $this->db->prepare($sql);
		$stmt->execute($param);
		
		while ( $row = $stmt->fetch ( PDO::FETCH_NUM ) ) {
			return $row[0];
			break;
		}
	}
}
?>