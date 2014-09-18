<?php
class PatternService {
	private $patternDao;
	private $studentDao;
	private $dp;
	public function __construct($dp) {
		$this->patternDao = new PatternDao ( $dp );
		$this->studentDao = new StudentDao ( $dp );
		$this->dp = $dp;
	}
	public function insert() {
		
		try {
			$this->dp->getDB()->beginTransaction();
			

			$st = new Student();
			$st->name="Java1";
			$st->address="insert java";
	
			$this->studentDao->insert($st);
			
			
			$pt = new Pattern();
			$pt->title = "test insert";
			$this->patternDao->insert($pt);
			//$x= 1/0;
			$this->dp->getDB()->commit();
		} catch(PDOException $ex) {
			//Something went wrong rollback!
			$this->dp->getDB()->rollBack();
			echo $ex->getMessage();
		}
	}
}
?>