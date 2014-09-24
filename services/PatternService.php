<?php
class PatternService {
	private $patternDao;
	private $patternDetailDao;
	private $patternHeaderDao;
	private $studentDao;
	private $dp;
	public function __construct($dp) {
		$this->patternDao = new PatternDao ( $dp );
		$this->patternDetailDao = new PatternDetailDao($dp);
		$this->patternHeaderDao = new PatternColumnDao ( $dp );
		$this->studentDao = new StudentDao ( $dp );
		$this->dp = $dp;
	}
	
	public function getById($id, $detail = false){
		$result = new PatternDto();
		
		$info = $this->patternDao->getById($id);
		$result->info = $info;
		
		if($detail){
			$header = $this->patternHeaderDao->getByPatternId($id);
			$data = $this->patternDetailDao->getByPatternId($id);
			$result->header=$header;
			$result->data=$data;		
		}

		return $result;
	}
	public function insert($pattern){
		$patternId = -1;
		try {
			$this->dp->getDB ()->beginTransaction ();
			
			// Insert pattern;
			$patternId = $this->patternDao->insert ( $pattern->info );
			$columnIdArr = array ();
			
			foreach ( $pattern->header as $key => $column ) {
				$column->patternid = $patternId;
				$columnId = $this->patternHeaderDao->insert ( $column );
				$columnIdArr [] = $columnId;
			}
			for($i = 0; $i < count ( $pattern->data ); $i ++) {
				$detail = $pattern->data [$i];
				
				$detail->patternid = $patternId;
				
				$detail->columnid = $columnIdArr [($i % $pattern->info->columnsize)];
				$this->patternDetailDao->insert ( $detail );
			}
			$this->dp->getDB()->commit();
		} catch ( PDOException $ex ) {
			// Something went wrong rollback!
			$this->dp->getDB ()->rollBack ();
			echo $ex->getMessage ();
		}
		return $patternId;
	}
}
?>