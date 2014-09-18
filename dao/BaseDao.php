<?php
class BaseDao {
	protected $basePath = "";
	protected $db;
	public function __construct($db) {
		$this->db = $db;
		$class = new ReflectionClass(get_class($this));
		$this->basePath = $class->getFileName();
		$this->basePath = str_replace(".php", "", $this->basePath);
	}
	
}
?>