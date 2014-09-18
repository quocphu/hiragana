<?php
class StudentDao {
	private $db;
	public function __construct($db) {
		$this->db = $db;
	}
	private function mapper($row, $instance) {
		foreach ( $row as $property => $value ) {
			
			$instance->$property = $value;
		}
	}
	public function get($id) {
		$sql  = 'SELECT * FROM Student' ;
		
		
		$student = new Student();
		
		$student = $this->db->selectOne($sql,"Student");
		return $student;
	}
	
	public function getAll() {
		$sql = $this->db->readTextFile("dao/StudentDao_getAll.sql");
		$rs = $this->db->select($sql,"Student");
		return $rs;
	}
	public function insert($st){
		echo "insert student";
		$sql = $this->db->readTextFile("dao/StudentDao_insert.sql");
		return $this->db->insertAndGetLastId($sql, $st);
	}
}
?>